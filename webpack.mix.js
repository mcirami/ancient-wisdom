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


mix.options({processCssUrls: false})
    .js('assets/js/app.js', 'js/app.js')
    .sass('assets/sass/app.scss', 'css/app.css')
    .minify('js/app.js', 'js')
    .minify('css/app.css', 'css')
    .sourceMaps();
/*.styles('assets/css/normalize.css', 'css/app.css')*/
mix.browserSync('wisdom.test');
