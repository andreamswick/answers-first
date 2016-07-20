var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var npm = './node_modules/',
    fonts = [
        npm + 'font-awesome/fonts',
        npm + 'bootstrap-sass/assets/fonts/bootstrap'
    ]

elixir(function (mix) {
    mix.sass('app.scss')
        .copy(fonts, 'public/fonts')
        .browserify('app.js');
});
