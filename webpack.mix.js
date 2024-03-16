const mix = require('laravel-mix');  
  
mix.js('resources/js/app.js', 'public/js')  
    .sass('resources/sass/app.scss', 'public/css')  
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')  
    .copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')  
    .copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');