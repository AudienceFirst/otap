module.exports = {
  root: true,
  extends: "eslint:recommended",
  globals: {
    wp: true
  },
  env: {
    browser: true,
    es6: true,
    jquery: true
  },
  parserOptions: {
    sourceType: "module",
    ecmaVersion: 8
  },
  rules: {
    "no-console": 0,
    "no-debugger": 1,
    semi: ["error", "never"]
  }
}
