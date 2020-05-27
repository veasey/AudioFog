const mix = require('laravel-mix');

mix.scripts([
    'resources/js/app.js',
    'resources/js/player.js'
 ], 'resources/js/trackshare.js')
 .js('resources/js/trackshare.js', 'public/js');

mix.sass('resources/sass/app.scss', 'public/css/')
.sass('resources/sass/player.scss', 'public/css/')
.styles([
  'public/css/app.css',
  'public/css/player.css'
], 'public/css/style.css');
