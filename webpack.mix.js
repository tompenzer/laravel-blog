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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')

mix.js([
    'resources/assets/admin/js/admin.js'
], 'public/js/admin.js')
    .sass('resources/assets/admin/sass/admin.scss', 'public/css')

mix.copyDirectory('resources/assets/images', 'public/images')
mix.copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/images/icons.svg')

/*
 * Doing the versioning for both dev and prod since I can't figure out how to
 * use the mix() helper method in blade templates with the public/images assets
 * copied with mix.copyDirectory() in dev when mix.version() isn't run for those
 * files. They get omitted from the mix-manifest.json file if you don't run
 * mix.version(), and then mix() blade helper throws an exception for those
 * files if you have debug mode set to true.
 */
mix.version(['public/images'])
