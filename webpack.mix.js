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

mix

.copyDirectory('resources/views/app/ajax', 'public/backend/ajax')
.copyDirectory('resources/views/app/css', 'public/backend/css')
.copyDirectory('resources/views/app/icons', 'public/backend/icons')
.copyDirectory('resources/views/app/images', 'public/backend/images')
.copyDirectory('resources/views/app/js', 'public/backend/js')
.copyDirectory('resources/views/app/scss', 'public/backend/scss')
.copyDirectory('resources/views/app/vendor', 'public/backend/vendor')




    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])


;
