let mix = require('laravel-mix');

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

// public
mix.js('resources/assets/js/landing.js', 'public/js');

// shared
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// admin
mix.js([
        'resources/assets/js/admin.js',
        'resources/assets/js/sb-admin/sb-admin.js',
    ], 'public/js')
    .sass('resources/assets/sass/admin/admin.scss', 'public/css');