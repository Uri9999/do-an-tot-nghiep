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
   .sass('resources/sass/frontend-css/style.scss', 'public/css/frontend-css')
   .sass('resources/sass/frontend-css/search.scss', 'public/css/frontend-css')
   .sass('resources/sass/frontend-css/style-cart.scss', 'public/css/frontend-css')
   .sass('resources/sass/frontend-css/style-detail.scss', 'public/css/frontend-css')
   .sass('resources/sass/frontend-css/contact.scss', 'public/css/frontend-css')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/admin-lte/user.scss', 'public/css/admin-lte')
   .sass('resources/sass/user/index.scss', 'public/css/user')
   .sass('resources/sass/user/checkout.scss', 'public/css/user')
   .sass('resources/sass/user/detail.scss', 'public/css/user')
   .js('resources/js/cart.js', 'public/js')
   .js('resources/js/user/index.js', 'public/js/user')
   .js('resources/js/user/cart.js', 'public/js/user')
   .js('resources/js/user/coupon.js', 'public/js/user')
   .version();
