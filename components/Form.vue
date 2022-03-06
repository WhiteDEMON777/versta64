<template>
  <form class="form">
    <div class="title">Напишите нам</div>
    <div class="form__container">
      <input id="project_name" v-model="projectName" type="hidden" name="project_name" value="Versta64" />
      <input id="form_subject" v-model="formSubject" type="hidden" name="form_subject" value="Заявка с сайта" />
      <label for="firstName" class="form__label">Имя</label>
      <input id="firstName" v-model="firstName" name="firstName" type="text" class="form__input" />
      <label for="email" class="form__label">email</label>
      <input id="email" v-model="email" name="email" type="email" class="form__input" />
      <label for="phone" class="form__label">телефон</label>
      <input id="phone" v-model="phone" v-imask="mask" name="phone" type="tel" class="form__input" />
      <label for="message" class="form__label">Ваше сообщение</label>
      <textarea id="message" v-model="message" name="message" class="form__textarea"></textarea>
      <button @click.prevent="sendEmail" class="form__btn btn btn--red">Отправить</button>
      <div v-if="error" class="form__error">{{ errorText }}</div>
      <div v-if="success" class="form__success">&#10003; Сообщение отправлено</div>
    </div>
  </form>
</template>

<script>
import { IMaskDirective } from 'vue-imask';
import api from '@/api_client/api';

export default {
  directives: {
    imask: IMaskDirective,
  },
  data() {
    return {
      projectName: 'Versta64',
      formSubject: 'Заявка с сайта',
      firstName: '',
      email: '',
      phone: '',
      message: '',
      error: false,
      success: false,
      errorText: '',
      token: '',
      mask: {
        mask: '+{7} (000) 000-00-00',
      },
    };
  },
  async mounted() {
    try {
      await this.$recaptcha.init();
      this.token = await this.$recaptcha.execute();
      this.$store.commit('setToken', this.token);
    } catch (e) {
      console.log(e);
    }
  },

  methods: {
    sendEmail() {
      const params = new URLSearchParams();
      params.append('Имя', this.firstName);
      params.append('Email', this.email);
      params.append('Телефон', this.phone);
      params.append('Сообщение', this.message);
      params.append('project_name', this.projectName);
      params.append('form_subject', this.formSubject);
      api.metods().getToken(
        params,
        this.$store.state.token,
        (res) => {
          console.log('res', res);
          const isEmail = (email) => {
            return /^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(?:\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@(?:[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(?:aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$/.test(
              email
            );
          };
          if (this.firstName === '') {
            this.error = true;
            this.success = false;
            this.errorText = 'Введите имя';
          } else if (this.email === '') {
            this.error = true;
            this.success = false;
            this.errorText = 'Введите Email';
          } else if (!isEmail(this.email)) {
            this.error = true;
            this.success = false;
            this.errorText = 'Некорректный Email';
          } else if (this.phone === '') {
            this.error = true;
            this.success = false;
            this.errorText = 'Введите телефон';
          } else if (this.message === '') {
            this.error = true;
            this.success = false;
            this.errorText = 'Введите сообщение';
          } else {
            this.error = false;
            api.metods().postEmail(params, (res) => {
              this.success = true;
              this.firstName = '';
              this.email = '';
              this.phone = '';
              this.message = '';
              this.$recaptcha.reset();
              this.$store.commit('setToken', this.token);
            });
          }
        },
        (err) => {
          console.log('err', err);
        }
      );
    },
  },
  // async verifyCaptcha() {
  //   try {
  //     const token = await this.$recaptcha.execute();
  //     const response = await this.$axios.$post(`/captcha-api/siteverify?secret=6LeZZLUeAAAAAGdN-OtEA9bl9l9MssMz-8oueb5x&response=${token}`);
  //     return response;
  //   } catch (error) {
  //     this.loading = false;
  //     return error;
  //   }
  // },
};
</script>
