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

mix.setPublicPath('public/build')
    .setResourceRoot('build')
    .version();

//adminlte
mix.scripts([
    'node_modules/admin-lte/plugins/jquery/jquery.min.js',
    'node_modules/admin-lte/plugins/jqvmap/jquery.vmap.min.js',
    'node_modules/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js',
    'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'node_modules/admin-lte/plugins/moment/moment.min.js',
    'node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js',
    'node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js',
    'node_modules/admin-lte/plugins/fastclick/fastclick.js',
    'node_modules/admin-lte/plugins/select2/js/select2.full.min.js',
    'node_modules/admin-lte/plugins/select2/js/select2.min.js',
    'node_modules/admin-lte/plugins/chart.js/Chart.min.js',
    'node_modules/admin-lte/plugins/sparklines/sparkline.js',
    'node_modules/admin-lte/plugins/summernote/summernote.min.js',
    'node_modules/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'node_modules/admin-lte/dist/js/adminlte.js',
    'node_modules/admin-lte/dist/js/demo.js',
    'resources/js/adminltecustom.js',
], 'public/build/adminlte/js/adminlte.js');
//app
mix.styles([
    'resources/frontassets/css/bootstrap.min.css',
    'resources/frontassets/css/font-awesome.min.css',
    'resources/frontassets/css/animate.min.css',
    'resources/frontassets/css/owl.carousel.css',
    'resources/frontassets/css/owl.theme.css',
    'resources/frontassets/css/owl.transitions.css',
    'resources/frontassets/css/style.css',
    'resources/frontassets/css/responsive.css',
], 'public/build/css/app.css');
//app
mix.copyDirectory('resources/frontassets/fonts', 'public/build/fonts');
mix.copyDirectory('resources/frontassets/images', 'public/assets/images');
//adminlte
mix.copyDirectory('node_modules/admin-lte/dist/img', 'public/build/adminlte/img')
   .copyDirectory('node_modules/admin-lte/dist/css/alt', 'public/build/adminlte/css/alt')
   .copyDirectory('node_modules/admin-lte/plugins/fontawesome-free/webfonts', 'public/build/adminlte/webfonts')
   .copyDirectory('node_modules/admin-lte/plugins/summernote/font', 'public/build/adminlte/css/font');
//adminlte
mix.styles([
    'node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css',
    'node_modules/admin-lte/plugins/tempusdominus-bootstrap4/css/tempusdominus-bootstrap4.min.css',
    'node_modules/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'node_modules/admin-lte/plugins/jqvmap/jqvmap.min.css',
    'node_modules/admin-lte/plugins/daterangepicker/daterangepicker.css',
    'node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    'node_modules/admin-lte/plugins/select2/css/select2.min.css',
    'node_modules/admin-lte/plugins/summernote/summernote-bs4.min.css',
    'node_modules/admin-lte/dist/css/adminlte.css',
    'resources/sass/adminltecustom.scss',
], 'public/build/adminlte/css/adminlte.css');
//app
mix.scripts([
    'resources/frontassets/js/jquery-1.11.3.min.js',
    'resources/frontassets/js/bootstrap.min.css',
    'resources/frontassets/js/owl.carousel.min.js',
    'resources/frontassets/js/jquery.stickit.min.js',
    'resources/frontassets/js/scripts.js',
    'resources/frontassets/js/map.js',
], 'public/build/js/app.js');
