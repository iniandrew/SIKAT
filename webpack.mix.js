const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);


mix.copy('resources/assets/js', 'public/assets/js');
mix.copy('resources/assets/css', 'public/assets/css');
mix.copy('resources/assets/img', 'public/assets/img');
mix.copy('resources/assets/fonts', 'public/assets/fonts');

mix.css('resources/assets/css/style.css', 'public/assets/css');
mix.js('resources/assets/js/scripts.js', 'public/assets/js');
mix.js('resources/assets/js/stisla.js', 'public/assets/js');
