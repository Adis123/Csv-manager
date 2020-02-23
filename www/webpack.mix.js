const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            '@':__dirname+'/resources'
        }

    }
});


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
    .copy('resources/vendor/', 'public/vendor', false)
    .copy('resources/demo/', 'public/js/demo', false)
    .copy('resources/photos', 'public/images', false)
    .js('resources/js/sb-admin-2.js', 'public/js', false)
    .sass('resources/sass/sb-admin-2.scss', 'public/css');
