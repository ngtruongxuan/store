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

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/
mix.js([
        // 'resources/assets/js/app.js',
        'resources/assets/webs/js/app.js',
    ], 'public/webs/js/app.js')
    .styles([
        'resources/assets/webs/css/app.css',
        'resources/assets/webs/css/header.css',
    ], 'public/webs/css/app.css');
// https://browsersync.io/docs/options
mix.browserSync({
    proxy: 'tx.me'
});