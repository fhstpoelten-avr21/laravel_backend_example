const mix = require('laravel-mix');

mix.webpackConfig({
    watchOptions: {
        ignored: /node_modules/
    }
})

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/swagger.js', 'public/js')
    .copy('node_modules/swagger-ui/dist/swagger-ui.css', 'public/css')
    .copy('resources/css/theme-material.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
