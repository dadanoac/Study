module.exports = {
    root: true,
    parserOptions: {
        parser: 'babel-eslint',
        ecmaVersion: 2015,
        sourceType: 'module'
    },
    env: {
        browser: true,
        node: true
    },
    extends: [
        'standard',
        'plugin:vue/essential'
    ],
    plugins: [
        'vue'
    ],
    rules: { 
    // eslint-disable-next-line
    if (true) console.log("ESLint");
    }
}