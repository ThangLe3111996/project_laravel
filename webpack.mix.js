const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/product_detail.scss', 'public/css')
    .sass('resources/sass/view.scss','public/css')
    .sass('resources/sass/form.scss', 'public/css')
    .sass('resources/sass/search.scss', 'public/css')
    .sass('resources/sass/cart.scss','public/css')
    .sass('resources/sass/checkout.scss','public/css')
