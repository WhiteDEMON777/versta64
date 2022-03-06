<?php
/**
 * Created by PhpStorm.
 * User: mher
 * Date: 9/13/17
 * Time: 4:33 PM
 */

namespace Tenweb_Manager {


  class RestApi {

    private static $instance = null;

    private $namespace = TENWEB_REST_NAMESPACE;

    private $bases = array(

      'tenweb_state' => array('/tenweb_state', true, false, false),//get,post,delete
      'site_state' => array('/site_state', true, false, false),//get,post,delete
      'action' => array('/action', false, true, false),
      'wp_update' => array('/wp_update', false, true, false),
      'check_domain' => array('/check_domain', false, true, false),
      'templates' => array('/templates', false, true, false),

      'restart_migration_file' => array('/restart_migration_file', false, true, false),
      'create_migration_file' => array('/create_migration_file', false, true, false),
      'migrate' => array('/migrate', true, false, false),
      'logout' => array('/logout', false, true, false),
      'remove_migration_file' => array('/remove_migration_file', false, true, false),

    );

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes(){
      foreach($this->bases as $key => $route_config) {
        $endpoint = $this->get_endpoint($key);

        // readable
        if($route_config[1]) {

          register_rest_route($this->namespace, $endpoint,
            array(
              'methods' => \WP_REST_Server::READABLE,
              'callback' => array($this, 'get_item'),
              'permission_callback' => array($this, 'get_items_permissions_check'),
              'args' => array(),
            )
          );

        }

        // writable
        if($route_config[2]) {

          register_rest_route($this->namespace, $endpoint,
            array(
              'methods' => \WP_REST_Server::CREATABLE,
              'callback' => array($this, 'update_item'),
              'permission_callback' => array($this, 'create_item_permissions_check'),
              'args' => array(),
            )
          );

        }

        // deletable
        if($route_config[3]) {

          register_rest_route($this->namespace, $endpoint,
            array(
              'methods' => \WP_REST_Server::DELETABLE,
              'callback' => array($this, 'delete_item'),
              'permission_callback' => array($this, 'delete_item_permissions_check'),
              'args' => array(),
            )
          );

        }


      }

    }

    /**
     * get endpoint route by its key(string identificator )
     *
     */
    private function get_endpoint($key){

      if(array_key_exists($key, $this->bases)) {
        return $this->bases[$key][0];
      }

      return false;

    }

    /**
     * get endpoint key by its route
     *
     */
    private function parse_endpoint($route){

      $route_url = substr($route, 6);

      foreach($this->bases as $key => $value) {
        $route_regex = '/' . substr($value[0], 1) . '/';

        if(preg_match($route_regex, substr($route_url, 1))) {
          return $key;
        }
      }

      return null;

    }

    /**
     * @param \WP_REST_Request $request Full data about the request.
     * @return boolean|array true on success or array on failure
     * */
    private function authorize($request){

      $response = array(
        "code" => "unauthorized",
        "message" => "unauthorized: incorrect token",
        "data" => array(
          "status" => 401
        )
      );

      $token = $request->get_header('tenweb-authorization');
      if(empty($token)) {
        $response['message'] = 'unauthorized: no token';
        return $response;
      }

      //check user pwd
      if($this->check_permission($token) === true) {
        return true;
      }

      //check token
      if(Api::get_instance()->check_single_token($token) === true) {
        return true;
      }

      return $response;
    }

    private function check_permission($pass = ''){
      $user = User::get_instance();

      /// get pwd from rest
      return $user->check_password($pass);
    }

    /**
     * Get a collection of items
     *
     * @param \WP_REST_Request $request Full data about the request.
     *
     * @return \WP_Error|\WP_REST_Response
     */
    public function get_item($request){

      $data_for_response = array();
      $headers_for_response = array();

      $route = $request->get_route();
      $parameters = self::wp_unslash_conditional($request->get_query_params());


      $login_instance = Login::get_instance();

      if(!$login_instance->check_logged_in()) {
        $data_for_response = array(
          "code" => "unauthorized",
          "message" => "manager unauthorized, please login",
          "data" => array(
            "status" => 401
          )
        );

        return new \WP_REST_Response($data_for_response, 401);
      }

      $endpoint = $this->parse_endpoint($route);


      $authorize = $this->authorize($request);
      if(is_array($authorize)) {
        return new \WP_REST_Response($authorize, 401);

      }

      if(get_site_option(TENWEB_PREFIX . '_is_available') !== '1') {
        update_site_option(TENWEB_PREFIX . '_is_available', '1');
      }

      switch($endpoint) {
        case 'tenweb_state':

          $status = 200;
          $data_for_response = array(
            "code" => "ok",
            "data" => Helper::get_manager_info()
          );
          break;
        case 'site_state':
          $status = 200;
          $data_for_response = array(
            "code" => "ok",
            "data" => Helper::get_site_full_state()
          );
          break;
        case 'migrate':
          // check parameters

          /*if (empty($parameters["file"])) {
            $status = 422;
            $data_for_response = array(
              "code"    => "unprocessable",
              "message" => "Unprocessable entity file",
              "data"    => array(
                "status" => 422
              )
            );
          } else{*/
          if(($migration_response = $this->migrate($parameters["start"], $parameters["chunk"])) === true) {
            $status = 200;
            $data_for_response["data"] = "ok";
          } else {
            $status = 500;
            $data_for_response = array(
              "code" => "migration_error",
              "message" => $migration_response,
              "data" => array(
                "status" => 500
              )
            );
          }
          // }

          break;
        default:

          $status = 404;
          $data_for_response = array(
            "code" => "rest_no_route",
            "message" => "No route was found matching the URL and request method",
            "data" => array(
              "status" => 404
            )
          );

          break;
      }


      return new \WP_REST_Response($data_for_response, $status, $headers_for_response);
    }

    /**
     * Create one item from the collection
     *
     * @param \WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|WP_REST_Request
     */
    public function update_item($request){

      $data_for_response = array();
      $headers_for_response = array();

      $route = $request->get_route();
      $endpoint = $this->parse_endpoint($route);
      if(isset($_REQUEST['tenweb_nonce'])) {
        if(!check_ajax_referer('wp_rest', 'tenweb_nonce', false)) {
          $data_for_response = array(
            "code" => "wrong_nonce",
            "message" => "Wrong nonce.",
            "data" => array(
              "status" => 401
            )
          );

          return new \WP_REST_Response($data_for_response, 404);
        }
      } else {

        $login_instance = Login::get_instance();
        if($endpoint != 'check_domain') {   // check domain is public


          if(!$login_instance->check_logged_in()) {
            $data_for_response = array(
              "code" => "unauthorized",
              "message" => "manager unauthorized, please login",
              "data" => array(
                "status" => 401
              )
            );

            return new \WP_REST_Response($data_for_response, 401);
          }
        }

        if($endpoint != 'check_domain') {
          $authorize = $this->authorize($request);
          if(is_array($authorize)) {
            return new \WP_REST_Response($authorize, 401);

          }
        }

      }

      if(get_site_option(TENWEB_PREFIX . '_is_available') !== '1') {
        update_site_option(TENWEB_PREFIX . '_is_available', '1');
      }

      $parameters = self::wp_unslash_conditional($request->get_body_params());
      switch($endpoint) {

        case 'action':


          $prev_user = wp_get_current_user();

          $action_response = $this->products_action_endpoint($parameters);
          User::login_prev_user($prev_user);


          $status = $action_response['status'];
          $data_for_response = $action_response['data_for_response'];

          if(empty($data_for_response['data'])) {
            $data_for_response['data'] = array();
          }

          if(empty($data_for_response['data']['status'])) {
            $data_for_response['data']['status'] = $status;
          }

          break;
        case 'templates':
            $template_id = intval($parameters['template_id']);
            $type = $parameters['type'];
            $action = $parameters['action'];

            $response = $this->install_template($template_id,$type,$action);

            $status = $response['status'];
            $data_for_response = $response['data_for_response'];

          break;

          case 'wp_update':

          include_once 'class-update-wp.php';
          $wp_update = new UpdateWP();
          $res = $wp_update->update();

          if(is_wp_error($res)) {
            $status = 500;
            $data_for_response = array(
              "code" => $res->get_error_code(),
              "message" => $res->get_error_message(),
              "data" => array("status" => 500)
            );
          } else {
            $status = 200;
            $data_for_response = array(
              "code" => 'update_successful',
              "message" => 'WordPress successfully updated.',
              "data" => array(
                "status" => 200,
                "wp_version" => $wp_update->tenweb_get_version()
              )
            );
          }

          delete_site_option(TENWEB_PREFIX . '_site_state_hash');
          Helper::check_site_state();

          break;
        case 'check_domain':
          $status = 200;

          if(isset($parameters['confirm_token'])) {
            $confirm_token_saved = get_site_transient(TENWEB_PREFIX . '_confirm_token');
            if($parameters['confirm_token'] === $confirm_token_saved) {
              $data_for_response = array(
                "code" => "ok",
                "data" => "it_was_me"  // do not change
              );
              $headers_for_response = array('tenweb_check_domain' => "it_was_me");
            } else {
              $data_for_response = array(
                "code" => "ok",
                "data" => "it_was_not_me" // do not change
              );
              $headers_for_response = array('tenweb_check_domain' => "it_was_not_me");
            }
            delete_site_transient(TENWEB_PREFIX . '_confirm_token');
          } else {
            $data_for_response = array(
              "code" => "ok",
              "data" => "alive"  // do not change
            );
            $headers_for_response = array('tenweb_check_domain' => "alive");
          }

          break;
        case 'create_migration_file':
          if(!empty($parameters['subdomain'])) {
            set_site_transient('tenweb_subdomain', $parameters['subdomain']);
          }

          if(!empty($parameters['migrate_domain_id'])) {
            set_site_transient('tenweb_migrate_domain_id', $parameters['migrate_domain_id']);
          }

          if(!empty($parameters['live'])) {
            set_site_transient('tenweb_migrate_live', $parameters['live']);
          } else {
            set_site_transient('tenweb_migrate_live', 0);
          }

          if(!empty($parameters['region'])) {
            set_site_transient('tenweb_migrate_region', $parameters['region']);
          }

          if (!empty($parameters['tp_domain_name'])) {
             set_site_transient('tenweb_tp_domain_name', $parameters['tp_domain_name']);
          } else {
              set_site_transient('tenweb_migrate_live', '');
          }
          $password = '';
          $iv = '';

          if(isset($parameters['password'])){
              $password = $parameters['password'];
          }

          if(isset($parameters['iv'])){
              $iv = $parameters['iv'];
          }


          $response = $this->create_migration_file($password, $iv);

          if($response["status"] == 'ok') {
            $status = 200;
            $data_for_response["data"] = $response["response"];
            Helper::store_migration_log('migrate_success', 'Successfully migrated.');
          } else {
            $status = 500;
            $data_for_response = array(
              "code" => "migration_zip_error",
              "message" => $response["response"],
              "data" => array(
                "status" => 500
              )
            );

            Helper::store_migration_log('migrate_failed', $response["response"]);
          }
          break;
        case 'restart_migration_file':
          $status = 200;
          $data_for_response = $this->restart_migration_file();
          break;
        case 'logout':
          $status = 200;
          $login = Login::get_instance();
          $login->logout(false);
          $data_for_response = array(
            "code" => "ok",
          );
          break;
        case 'remove_migration_file':
          $status = 200;
          $data_for_response = $this->remove_migration_file();
          if(!empty($parameters['logout'])) {
            delete_option("tenweb_access_token");
          }
          break;
        default:

          $data_for_response = array(
            "code" => "rest_no_route",
            "message" => "No route was found matching the URL and request method",
            "data" => array(
              "status" => 404
            )
          );

          $data_for_response = apply_filters('tenweb_rest_update', $data_for_response, $request);
          $status = $data_for_response['status'];

          break;
      }


      $tenweb_hash = $request->get_header('tenweb-check-hash');
      if(!empty($tenweb_hash)) {
        $encoded = '__' . $tenweb_hash . '.';
        $encoded .= base64_encode(json_encode($data_for_response));
        $encoded .= '.' . $tenweb_hash . '__';

        $data_for_response['encoded'] = $encoded;
        Helper::set_error_log('tenweb-check-hash', $encoded);
      }

      return new \WP_REST_Response($data_for_response, $status, $headers_for_response);
    }

    /**
     *
     * @param $password
     * @param $iv
     *
     * @return mixed
     */
    private function create_migration_file($password, $iv){
      Helper::store_migration_log('start_migrate', 'Starting create_migration_file function.');
      set_site_transient(TENWEB_PREFIX . "_migration_start_time", microtime(true));

      $migration_instance = new MigrationRun();
      // load classes
      $migration_instance->load_classes();

      $tmp_dir = Migration::get_tmp_dir();

      if(is_dir($tmp_dir)) {
        Helper::store_migration_log('tenweb_tmp_folder_exists', 'Removing existing ' . $tmp_dir . ' folder.');
        Migration::role_back(false);
      }
      else {
        Helper::store_migration_log('tenweb_tmp_folder', 'Temp folder is ' . $tmp_dir . '.');
      }

      // execute migration run function to create migrated files
      $response_config = $migration_instance->run_config(new MigrationConfig());
      $response_db = $migration_instance->run_db(new MigrationDB($password, $iv));
      $response = $migration_instance->run_content("run");

      if($response_config === false || $response_db === false || $response === false) {
        return array(
          "status" => "failed",
          "response" => $migration_instance->get_error()
        );
      } else {
        return array(
          "status" => "ok",
          "response" => $response
        );
      }

    }


    /**
     *
     * @return array
     */
    private function restart_migration_file() {
      Helper::store_migration_log('restart_migration_file' . current_time('timestamp'), 'Entering restart_migration_file function.');

      set_site_transient(TENWEB_PREFIX . "_migration_start_time", microtime(true));
      $migration_instance = new MigrationRun();
      include_once TENWEB_INCLUDES_DIR . '/class-migration.php';
      include_once TENWEB_INCLUDES_DIR . '/class-migration-content.php';
      $response = $migration_instance->run_content("restart");

      if($response === false) {
        return array(
          "status" => "failed",
          "response" => $migration_instance->get_error()
        );
      } else {
        return array(
          "status" => "ok",
          "response" => $response
        );
      }

    }

    /**
     * @param $file
     *
     * @return mixed
     */
    private function migrate($start_byte, $chunk_size){
      $migration_instance = new MigrationRun();
      include_once TENWEB_INCLUDES_DIR . '/class-migration.php';
      include_once TENWEB_INCLUDES_DIR . '/class-migration-content.php';
      $migration_file = Migration::get_tmp_dir() . '/' . Migration::getMigrationArchive();
      if(explode('.', MigrationContent::getMigrationArchive()) == 'tar') {
        $migration_file = $migration_file . 'gz';
      }
      // execute migration run function
      $migration_instance->migrate($migration_file, $start_byte, $chunk_size);

      if($migration_instance->get_error()) {
        return $migration_instance->get_error();
      } else {
        return true;
      }

    }

    private function products_action_endpoint($parameters){

      require_once(ABSPATH . 'wp-admin/includes/file.php');
      require_once(ABSPATH . 'wp-admin/includes/misc.php'); // extract_from_markers() wp-super-cache deactivation fatal error fix

      $error_response = array(
        'status' => 404,
        'data_for_response' => array(
          "code" => "rest_no_route",
          "message" => "No route was found matching the URL and request method",
          "data" => array("status" => 404)
        )
      );

      $action = (!empty($parameters['action'])) ? $parameters['action'] : null;
      $product = $this->get_product($parameters);

      if($action === null || $product == null) {
        $error_response = array(
          'status' => 404,
          'data_for_response' => array(
            "code" => "product_not_found",
            "message" => "Product not found.",
            "data" => array(
              "status" => 404
            )
          )
        );

        return $error_response;
      }


      if(User::login_tenweb_user() === false) {
        $error_response = array(
          'status' => 404,
          'data_for_response' => array(
            "code" => "user_not_logged_in",
            "message" => "User not logged in.",
            "data" => array(
              "status" => 404
            )
          )
        );
        return $error_response;
      }

      $is_install_action = ($action == "install" /*|| $action == "install-activate"*/);
      if(!$is_install_action && !$product->is_installed()) {
        $error_response = array(
          'status' => 404,
          'data_for_response' => array(
            "code" => "product_not_installed",
            "message" => "Product not installed.",
            "data" => array(
              "status" => 404
            )
          )
        );

        return $error_response;
      }

      $is_upgrade = false;
      if($is_install_action && $product->is_installed()) {
        $state = $product->get_state();
        if($state->is_paid === true || $state->is_paid === null) {
          $error_response = array(
            'status' => 200,
            'data_for_response' => array(
              "code" => "product_already_installed",
              "message" => "Product already installed.",
              "data" => array(
                "status" => 200
              )
            )
          );

          return $error_response;
        } else {
          $is_upgrade = true;
          $action = 'update';
        }
      }


      $actions_with_fs = array('install', 'install-activate', 'delete', 'update');
      if(in_array($action, $actions_with_fs)) {

        $site_info = Helper::get_site_info();
        if($site_info['other_data']['file_system']['config'] == false) {

          return array(
            'status' => 404,
            'data_for_response' => array(
              'code' => "fs_not_configured",
              'message' => "File system not configured.",
              'data' => array()
            )
          );
        }

        if(function_exists('is_wpe') && is_wpe() && defined('WPE_APIKEY')) {

          $cookie_value = md5('wpe_auth_salty_dog|' . WPE_APIKEY);
          setcookie('wpe-auth', $cookie_value);
          if(!isset($_COOKIE['wpe-auth']) || $_COOKIE['wpe-auth'] != $cookie_value) {
            return array(
              'status' => 401,
              'data_for_response' => array(
                'code' => "wpe_cookie_not_set",
                'message' => "WPE hosting. Use wpe-auth cookie.",
                'data' => array()
              )
            );

          }
        }

      }

      $product->set_rest_parameters($parameters);
      switch($action) {
        case "install":

          if($product->install()) {
            $status = 200;
            $data_for_response['code'] = "install_successful";
            $data_for_response['message'] = "Successfully installed.";
          } else {
            $status = 404;
            $error = $product->get_error();

            $data_for_response['code'] = $error['code'];
            $data_for_response['message'] = $error['msg'];
          }
          break;
        case "install-activate":
          if($product->install(true)) {

            if($product->get_type() == 'theme') {
              $new_product = new InstalledTheme(
                null,
                $product->id,
                $product->slug,
                $product->title,
                $product->description
              );
            } else {
              $site_installed_plugins = get_plugins();

              $plugin_slug = null;
              foreach($site_installed_plugins as $slug => $plugin) {
                $slug_data = explode('/', $slug);
                if($slug_data[0] == $product->slug) {
                  $plugin_slug = $slug;
                  break;
                }
              }


              $new_product = new InstalledPlugin(
                null,
                $product->id,
                $product->slug,
                $product->title,
                $product->description,
                $plugin_slug

              );
            }

            $new_product->set_download_link($product->get_download_link());

            if($new_product->activate()) {
              $data_for_response['code'] = 'install_and_activate_successful';
              $data_for_response['message'] = 'Successfully installed and activated.';
              $status = 200;
            } else {
              $status = 404;
              $error = $new_product->get_error();

              $data_for_response['code'] = $error['code'];
              $data_for_response['message'] = $error['msg'];
            }

          } else {
            $status = 404;
            $error = $product->get_error();

            $data_for_response['code'] = $error['code'];
            $data_for_response['message'] = $error['msg'];
          }


          break;
        case "activate":
          $state = $product->get_state();
          if($state->active == 1) {

            $status = 200;
            $data_for_response['code'] = "activation_successful";
            $data_for_response['message'] = "Already activated.";
            break;

          }

          if($product->activate() == true) {
            $status = 200;
            $data_for_response['code'] = "activation_successful";
            $data_for_response['message'] = "Successfully activated.";
          } else {
            $status = 404;
            $error = $product->get_error();

            $data_for_response['code'] = $error['code'];
            $data_for_response['message'] = $error['msg'];
          }
          break;
        case "deactivate":
          if($product->get_type() == "plugin" || $product->get_type() == "addon") {

            $state = $product->get_state();
            if($state->active == 0) {

              $status = 200;
              $data_for_response['code'] = "deactivation_successful";
              $data_for_response['message'] = "Already deactivated.";
              break;

            }

            if($product->deactivate()) {
              $status = 200;

              $data_for_response['code'] = "deactivation_successful";
              $data_for_response['message'] = "Successfully deactivated.";
            } else {
              $status = 404;
              $error = $product->get_error();

              $data_for_response['code'] = $error['code'];
              $data_for_response['message'] = $error['msg'];
            }

          } else {

            $status = 404;

            $data_for_response['code'] = 'failed_to_deactivate';
            $data_for_response['message'] = 'Try to switch theme instead.';
          }


          break;
        case "update":
          if($product->id === TENWEB_MANAGER_ID && !empty($parameters['download_url'])) {
            $product->set_download_link($parameters['download_url']);
          }
          if($product->update()) {
            $status = 200;

            $data_for_response['code'] = "update_successful";
            $data_for_response['message'] = "Successfully updated.";
          } else {
            $status = 404;
            $error = $product->get_error();

            $data_for_response['code'] = $error['code'];
            $data_for_response['message'] = $error['msg'];
          }
          break;
        case "delete":

          if($product->delete()) {
            $status = 200;

            $data_for_response['code'] = "delete_successful";
            $data_for_response['message'] = "Successfully Deleted.";
          } else {
            $status = 404;
            $error = $product->get_error();

            $data_for_response['code'] = $error['code'];
            $data_for_response['message'] = $error['msg'];
          }
          break;
        default:
          $data_for_response = null;
      }

      if($product->get_type() == "plugin" || $product->get_type() == "addon") {
        wp_cache_delete('plugins', 'plugins');
      } else {
        wp_clean_themes_cache(false);
      }

      //refresh products object and products state
      Manager::get_instance()->set_products();
      //send new state
      Helper::check_site_state();

      if($data_for_response == null) {
        $response = $error_response;
      } else {
        $response = array(
          'data_for_response' => $data_for_response,
          'status' => $status
        );
      }

      if($is_upgrade) {
        $response['data_for_response']['data']['is_upgrade'] = '1';
      }

      do_action('tenweb_after_action', array(
        'action' => $action,
        'product_id' => $product->id,
        'response' => $response
      ));

      return $response;
    }

    /**
     * @return Product|null
     * */
    private function get_product($parameters){

      $origin = (!empty($parameters['origin'])) ? $parameters['origin'] : null;
      if($origin === "10web") {

        if(!empty($parameters['product_id'])) {

          $product = Manager::get_product_by('id', $parameters['product_id'], 'all', 'all');

          if($product == null) {
            Manager::get_instance()->set_products(true);
            $product = Manager::get_product_by('id', $parameters['product_id'], 'all', 'all');
          }

          return $product;
        } else {
          return null;
        }

      } else if($origin === "wp.org") {
        return $this->create_third_party_product_object($parameters, $origin);
      } else if($origin === "upload") {
        return $this->create_third_party_product_object($parameters, $origin);
      }

      return null;
    }

    private function create_third_party_product_object($parameters, $origin){

      $download_url = null;
      if($origin == "wp.org") {
        $slug = (!empty($parameters['slug'])) ? $parameters['slug'] : "";
      } else {
        $download_url = (!empty($parameters['url'])) ? $parameters['url'] : "";
        $path_info = pathinfo($download_url);
        $slug = $path_info['filename'];
      }


      if(empty($slug) || empty($parameters['type'])) {
        return null;
      }

      $product = null;
      $states = Helper::get_products_state();

      if($parameters['type'] === "plugin") {

        $site_installed_plugins = get_plugins();

        $installed_plugin = null;
        $installed_plugin_slug = null;

        foreach($site_installed_plugins as $_slug => $plugin) {
          $slug_data = explode('/', $_slug);
          if($slug_data[0] == $slug) {
            $installed_plugin = $plugin;
            $installed_plugin_slug = $_slug;
            break;
          }
        }

        if($installed_plugin_slug !== null) {

          $state = null;
          foreach($states['plugins'] as $plugin_state) {
            if($plugin_state->slug === $slug) {
              $state = $plugin_state;
              break;
            }
          }

          if($state === null) {
            foreach($states['addons'] as $plugin_state) {
              if($plugin_state->slug === $slug) {
                $state = $plugin_state;
                break;
              }
            }
          }

          $product = new InstalledPlugin(
            $state,
            0,
            $slug,
            $installed_plugin['Title'],
            $installed_plugin['Title'],
            $installed_plugin_slug
          );

        } else {
          $product = new Product(
            0,
            $slug,
            "",
            ""
          );
        }

      } else if($parameters['type'] === "theme") {

        $site_installed_themes = wp_get_themes(array('errors' => null));

        if(isset($site_installed_themes[$slug])) {

          $state = null;
          foreach($states['themes'] as $theme_state) {
            if($theme_state->slug === $slug) {
              $state = $theme_state;
              break;
            }
          }

          $product = new InstalledTheme(
            $state,
            0,
            $slug,
            $site_installed_themes[$slug]->get("Name"),
            $site_installed_themes[$slug]->get("Description")
          );

        } else {
          $product = new Product(
            0,
            $slug,
            "",
            "",
            'theme'
          );
        }

      }

      $product->set_origin($origin);
      if(!empty($download_url)) {
        $product->set_download_link($download_url);
      }

      return $product;
    }

    /**
     * Delete one item from the collection
     *
     * @param WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|WP_REST_Request
     */
    public function delete_item($request){

      if(!defined('WDB_REST_DELETE_ITEM')) {
        define("WDB_REST_DELETE_ITEM", true);
      }

      global $wdb_manager;
      global $wdb_settings_controller;

      $route = $request->get_route();

      $endpoint = $this->parse_endpoint($route);

      $parameters = self::wp_unslash_conditional($request->get_body_params());
      $url_params = $request->get_url_params();
      $query_params = self::wp_unslash_conditional($request->get_query_params());

      $nonce = (is_array($query_params) && isset($query_params['nonce'])) ? $query_params['nonce'] : '';

      $a = wp_verify_nonce($nonce, 'wdb_rest_nonce');

      // /*check nonce*/
      if(!wp_verify_nonce($nonce, 'wdb_rest_nonce')) {
        // This nonce is not valid.
        $data_for_response = array(
          'success' => false,
          'message' => __('Invalid Nonce', WDB_LANG),
          'status' => 401,
          'data' => ''
        );

        return new \WP_REST_Response($data_for_response, 401);
      }

      switch($endpoint) {
        case 'mapper':
          $mapper = $wdb_manager->get_controller('SHORTCODES_MAPPER');

          /*filter id*/
          $id = is_array($url_params) && isset($url_params['id']) ? $url_params['id'] : -1;
          if((int)$id == $id && (int)$id > 0) { // positive integer
            $delete = $mapper->delete_shortcodes($id);

          } else {
            $delete = array(
              'response' => false,
              'message' => __('Wrong ID. Cannot Delete.', WDB_LANG),
              'status' => 400,
              'data' => ''
            );
          }
          /*stop here*/

          break;
        default:
          break;
      }

      if(is_array($delete) && isset($delete['response']) && $delete['response']) {
        $data_for_response = array(
          'success' => true,
          'message' => __('Successfully deleted', WDB_LANG),
          'status' => 200,
          'data' => ''
        );

        return new \WP_REST_Response($data_for_response, 200);
      } else {
        $message = (is_array($delete) && isset($delete['message'])) ? $delete['message'] : __('Cannot save data', WDB_LANG);
        $status = (is_array($delete) && isset($delete['status'])) ? $delete['status'] : 500;
        $data_for_response = array(
          'success' => false,
          'message' => $message,
          'status' => $status,
          'data' => '',
        );

        return new \WP_REST_Response($data_for_response, 500);
      }

    }

    /**
     * Check if a given request has access to get items
     *
     * @param WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|bool
     */
    public function get_items_permissions_check($request){
      //return true; <--use to make readable by all
      return true; //current_user_can( 'edit_something' );
    }

    /**
     * Check if a given request has access to get a specific item
     *
     * @param WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|bool
     */
    public function get_item_permissions_check($request){
      return $this->get_items_permissions_check($request);
    }

    /**
     * Check if a given request has access to create items
     *
     * @param WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|bool
     */
    public function create_item_permissions_check($request){
      return true; //current_user_can( 'edit_something' );
    }

    /**
     * Check if a given request has access to update a specific item
     *
     * @param WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|bool
     */
    public function update_item_permissions_check($request){
      return $this->create_item_permissions_check($request);
    }

    /**
     * Check if a given request has access to delete a specific item
     *
     * @param WP_REST_Request $request Full data about the request.
     *
     * @return WP_Error|bool
     */
    public function delete_item_permissions_check($request){
      return true;
    }

    /**
     * Prepare the item for create or update operation
     *
     * @param WP_REST_Request $request Request object
     *
     * @return WP_Error|object $prepared_item
     */
    protected function prepare_item_for_database($request){
      return array();
    }

    /**
     * Prepare the item for the REST response
     *
     * @param mixed $item WordPress representation of the item.
     * @param WP_REST_Request $request Request object.
     *
     * @return mixed
     */
    public function prepare_item_for_response($item, $request){
      return array();
    }

    /**
     * Get the query params for collections
     *
     * @return array
     */
    public function get_collection_params(){
      return array(
        'page' => array(
          'description' => 'Current page of the collection.',
          'type' => 'integer',
          'default' => 1,
          'sanitize_callback' => 'absint',
        ),
        'per_page' => array(
          'description' => 'Maximum number of items to be returned in result set.',
          'type' => 'integer',
          'default' => 10,
          'sanitize_callback' => 'absint',
        ),
        'search' => array(
          'description' => 'Limit results to those matching a string.',
          'type' => 'string',
          'sanitize_callback' => 'sanitize_text_field',
        ),
      );
    }

    /**
     * Delete zip after migration
     *
     * @return array
     */
    public function remove_migration_file(){
      include_once TENWEB_INCLUDES_DIR . '/class-migration.php';
      Migration::role_back();

      return array(
        "status" => "ok"
      );

    }


      public function install_template($template_id, $type, $action)
      {
          if(defined('TWBB_DIR') && is_file(TWBB_DIR . "/templates/import/import.php")) {
              include_once TWBB_DIR . "/templates/import/import.php";

              $import = new \Tenweb_Builder\Import();
              if($type === 'site') {


                  switch($action){
                      case 'install':
                          $result = $import->import_site_data($template_id);
                      break;

                      case 'start-import':
                          $result = $import->start_import($template_id);
                      break;

                      case 'import-plugins':
                          $result = $import->import_plugins($template_id);
                      break;

                      case 'import-site':
                          $result = $import->import_site($template_id);
                      break;

                      case 'finalize-import':
                          $result = $import->finalize_import($template_id);
                      break;

                  }
              }
              if(!isset($result)) {
                  $status = 401;
                  $data_for_response = array(
                      "code" => 'something_went_wrong',
                      "message" => 'Something went wrong.',
                      "data" => array(
                          "status" => 401,
                      )
                  );
              } else if(is_wp_error($result)) {
                  $status = 401;
                  $data_for_response = array(
                      "code" => 'wp_error',
                      "message" => $result->get_error_message(),
                      "data" => array(
                          "status" => 401,
                          "wp_error_code" => $result->get_error_code()
                      )
                  );
              } else {

                  $status = 200;
                  $data_for_response = array(
                      "code" => $action,
                      "message" => 'Success',
                      "data" => array(
                          "status" => 200,
                      )
                  );
              }

          } else {
              $status = 401;
              $data_for_response = array(
                  "code" => 'builder_plugin_not_available',
                  "message" => 'Builder plugin not available.',
                  "data" => array(
                      "status" => 401,
                  )
              );
          }

          return array('status' => $status , 'data_for_response' => $data_for_response);
    }


    /*
     * wp 4.4 adds slashes, removes them
     *
     * https://core.trac.wordpress.org/ticket/36419
     **/
    private static function wp_unslash_conditional($data){

      global $wp_version;
      if($wp_version < 4.5) {
        $data = wp_unslash($data);
      }

      return $data;
    }

    public static function get_instance(){
      if(null == self::$instance) {
        self::$instance = new self;
        self::$instance->register_routes();
      }

      return self::$instance;
    }

  }
}