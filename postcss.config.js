export default {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
        'postcss-pxtorem': {
            rootValue: 16,
            propList: ['font', 'font-size'],
            replace: true,
            mediaQuery: false,
            minPixelValue: 0
        }
    },
};
