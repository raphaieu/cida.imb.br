const mix = require('laravel-mix');

mix.browserSync('http://localhost:8000/');

mix.js('resources/js/app.js', 'public/js').vue({ version: 3})
    .sourceMaps()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
