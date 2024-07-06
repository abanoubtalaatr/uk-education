const mix = require('laravel-mix');

// Paths to your asset files
const jsSrc = 'resources/js/field.js';
const jsDest = 'public/js';
const sassSrc = 'resources/sass/app.scss';
const sassDest = 'public/css';

// Compile JavaScript
mix.js(jsSrc, jsDest);

// Compile Sass
mix.sass(sassSrc, sassDest);

// Additional configuration if needed
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.json', '.jsx', '.scss'] // Ensure .scss is included for Sass files
    }
});

// Optional: Disable notifications
mix.disableNotifications();
