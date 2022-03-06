import axios from 'axios';
const domain = 'https://admin.versta64.ru/wp-json';
const SECRET_KEY = '6LeZZLUeAAAAAGdN-OtEA9bl9l9MssMz-8oueb5x';

const metods = () => {
  return {
    // проверка есть ли в базе карта
    async getPages(id, perPage, succeesCallBack = function (data) {}, errorCallBack = function () {}) {
      await axios.get(`${domain}/wp/v2/pages/${id}`, { params: { per_page: perPage } }).then((response) => {
        if (response.status !== 200) {
          errorCallBack();
        } else {
          succeesCallBack(response);
        }
      });
    },
    async postEmail(params, succeesCallBack = function () {}, errorCallBack = function () {}) {
      await axios
        .post('/mail/mail.php', params, {
          headers: {
            'content-type': 'application/x-www-form-urlencoded',
          },
        })
        .then((response) => {
          if (response.status !== 200) {
            errorCallBack();
          } else {
            succeesCallBack(response);
          }
        });
    },
    async getToken(params, token, succeesCallBack = function () {}, errorCallBack = function () {}) {
      try {
        await axios.post(`/captcha-api/siteverify?secret=${SECRET_KEY}&response=${token}`, params).then((response) => {
          if (response.status !== 200) {
            errorCallBack();
          } else {
            succeesCallBack(response);
          }
        });
      } catch (error) {
        console.log('error', error);
      }
    },
  };
};

export default { metods };
