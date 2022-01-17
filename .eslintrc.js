module.exports = {
  root: true,
  env: {
    browser: true,
    node: true,
  },
  parserOptions: {
    parser: '@babel/eslint-parser',
    requireConfigFile: false,
  },
  extends: ['@nuxtjs', 'plugin:nuxt/recommended', 'prettier'],
  plugins: [],
  // add your custom rules here
  rules: {
    'no-unused-vars': ['off', { vars: 'all', args: 'after-used', ignoreRestSiblings: false }],
    'vue/no-deprecated-slot-attribute': 'off',
  },
};
