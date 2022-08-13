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
mix.options({ manifest: false })

mix.js('resources/js/app/app2.js', 'public/js/front/')
    .vue();
    // .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/admin/admin2.js', 'public/js/admin')
    .vue();
