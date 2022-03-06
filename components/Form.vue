<template>
  <form class="form">
    <div class="title">Напишите нам</div>
    <div class="form__container">
      <input id="project_name" v-model="projectName" type="hidden" name="project_name" value="Versta64" />
      <label for="user_name" class="form__label">Имя</label>
      <input id="user_name" v-model="firstName" name="user_name" type="text" class="form__input" />
      <label for="user_email" class="form__label">email</label>
      <input id="user_email" v-model="email" name="user_email" type="email" class="form__input" />
      <label for="user_phone" class="form__label">телефон</label>
      <input id="user_phone" v-model="phone" v-imask="mask" name="user_phone" type="tel" class="form__input" />
      <label for="user_message" class="form__label">Ваше сообщение</label>
      <textarea id="user_message" v-model="message" name="user_message" class="form__textarea"></textarea>
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
      projectName: 'Versta64MC',
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

  methods: {
    sendEmail() {
      const params = new URLSearchParams();
      params.append('user_name', this.firstName);
      params.append('user_email', this.email);
      params.append('user_phone', this.phone);
      params.append('user_message', this.message);
      params.append('project_name', this.projectName);
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
          console.log('res', res);
          this.success = true;
          this.firstName = '';
          this.email = '';
          this.phone = '';
          this.message = '';
        });
      }
    },
  },
};
</script>
