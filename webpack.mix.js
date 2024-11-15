const mix = require('laravel-mix');

// compile your raw resources/css/inventoryIndex.css into the public/css directory
mix.js('resources/js/app.js', 'public/js')
.css('resources/css/app.css', 'public/css');

