<?php
/**
 * Created by PhpStorm.
 * User: mher
 * Date: 10/18/18
 * Time: 3:44 PM
 */

?>

<div class="tenweb_cp_overlay">
    <div class="tenweb_cp_content">
        <p class="tenweb_cp_text1">Please wait,</p>
        <p class="tenweb_cp_text2">we’re connecting your site.</p>
        <div class="tenweb_cp_spinner_container">
            <img class="tenweb_cp_spinner" class="tenweb_cp_text2" src="<?php echo TENWEB_URL_IMG; ?>/spinner2.svg">
        </div>
    </div>
</div>
<style>
    .tenweb_cp_overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: #FFFFFF;
        display: block;
        z-index: 999999999;
    }

    .tenweb_cp_content {
        position: fixed;
        top: 48%;
        left: 50%;
        transform: translate(-50%, -45%);
        text-align: center;
    }

    .tenweb_cp_content p {
        font-family: 'Open Sans', sans-serif;
        color: #A3A8AB;
        font-size: 30px;
        line-height: 42px;
        margin: 0;
        padding: 0;
    }

    .tenweb_cp_text1 {
        font-weight: 900;
    }

    .tenweb_cp_text2 {
        font-weight: 300;
    }

    .tenweb_cp_spinner {
        width: 46px;
        height: 46px;
        animation: rotation 2s infinite linear;
    }

    @-webkit-keyframes rotation {
        from {
            transform: rotate(0deg);
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
        }
    }

    @keyframes loadingTextFadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes loadingTextSlideUp2 {
        0% {
            transform: translate3d(0, 20%, 0);
            -webkit-transform: translate3d(0, 20%, 0);
            -moz-transform: translate3d(0, 20%, 0);
        }
        100% {
            transform: translate3d(0, -50%, 0);
            -webkit-transform: translate3d(0, -50%, 0);
            -moz-transform: translate3d(0, -50%, 0);
        }
    }

    @keyframes loadingTextSlideUp3 {
        0% {
            transform: translate3d(0, 40%, 0);
            -webkit-transform: translate3d(0, 40%, 0);
            -moz-transform: translate3d(0, 40%, 0);
        }
        100% {
            transform: translate3d(0, -50%, 0);
            -webkit-transform: translate3d(0, -50%, 0);
            -moz-transform: translate3d(0, -50%, 0);
        }
    }

    @keyframes loadingTextSlideUp4 {
        0% {
            transform: translate3d(0, 30%, 0);
            -webkit-transform: translate3d(0, 30%, 0);
            -moz-transform: translate3d(0, 30%, 0);
        }
        100% {
            transform: translate3d(0, -50%, 0);
            -webkit-transform: translate3d(0, -50%, 0);
            -moz-transform: translate3d(0, -50%, 0);
        }
    }

    .tenweb_cp_text1 {
        animation: loadingTextSlideUp2 1.5s 0.25s cubic-bezier(0.39, 0.575, 0.565, 1), loadingTextFadeIn 1.4s 0.25s linear;
        animation-fill-mode: forwards;
        opacity: 0;
    }

    .tenweb_cp_text2 {
        animation: loadingTextSlideUp3 1.5s 0.8s cubic-bezier(0.39, 0.575, 0.565, 1), loadingTextFadeIn 1.5s 0.8s linear;
        animation-fill-mode: forwards;
        opacity: 0;
    }

    .tenweb_cp_spinner_container {
        animation: loadingTextSlideUp4 1.2s 1s, loadingTextFadeIn 1.7s 1s linear;
        animation-fill-mode: forwards;
        opacity: 0;
        margin-top: 20px;
    }

    #adminmenumain, #wpfooter, #wpcontent *:not(.tenweb_cp_overlay *) {
        display: none !important;
    }
</style>