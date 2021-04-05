const mix = require("laravel-mix");

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

//  Landing Page Mix
mix
    /*------------------
          JS file
    -------------------- */
    // Landing Page
    .js("resources/js/layout/landing-page.js", "public/js")
    // Login Page
    .js("resources/js/layout/login-page.js", "public/js")

    /*------------------
          CSS file
    -------------------- */
    // Landing Page
    .css("resources/css/layout/landing-page.css", "public/css")
    // Login Page
    .css("resources/css/layout/login-page.css", "public/css")
    .sourceMaps();
