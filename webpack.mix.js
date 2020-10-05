const mix = require('laravel-mix');

mix.version()
  .scripts([
    'resources/js/classes/player.js',
    'resources/js/player.js'
 ], 'public/app.js')
  .extract(['vue']);

mix.sass('resources/sass/app.scss', 'public/css')
.sass('resources/sass/player.scss', 'public/css');
