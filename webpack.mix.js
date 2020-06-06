const mix = require('laravel-mix');

mix.styles([
    'public/css/bootstrap.css',
    'public/css/reset.css',
    'public/css/skeleton.css',
    'public/css/superfish.css',
    'public/css/touchTouch.css',
    'public/css/form.css',
    'public/css/style.css',
    'public/css/font-awesome-5.min.css',
    'public/css/custom-styles.css'
], 'public/css/styles.min.css');

mix.browserSync({
    proxy: 'omegarecords.local'
});

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
