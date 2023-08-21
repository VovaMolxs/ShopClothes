import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/assets/css/main.css',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/assets/js/vendor/modernizr-3.6.0.min.js',
                'resources/js/assets/js/vendor/jquery-3.6.0.min.js',
                'resources/js/assets/js/vendor/jquery-migrate-3.3.0.min.js',
                'resources/js/assets/js/vendor/bootstrap.bundle.min.js',
                'resources/js/assets/js/plugins/slick.js',
                'resources/js/assets/js/plugins/jquery.syotimer.min.js',
                'resources/js/assets/js/plugins/jquery-ui.js',
                'resources/js/assets/js/plugins/perfect-scrollbar.js',
                'resources/js/assets/js/plugins/magnific-popup.js',
                'resources/js/assets/js/plugins/select2.min.js',
                'resources/js/assets/js/plugins/waypoints.js',
                'resources/js/assets/js/plugins/counterup.js',
                'resources/js/assets/js/plugins/jquery.countdown.min.js',
                'resources/js/assets/js/plugins/images-loaded.js',
                'resources/js/assets/js/plugins/isotope.js',
                'resources/js/assets/js/plugins/scrollup.js',
                'resources/js/assets/js/plugins/jquery.theia.sticky.js',
                'resources/js/assets/js/plugins/jquery.elevatezoom.js',
                'resources/js/assets/js/plugins/jquery.vticker-min.js',
                'resources/js/assets/js/plugins/wow.js',
                'resources/js/assets/js/main.js',
                'resources/js/assets/js/shop.js',
                'resources/js/AddReviews.js',
                'resources/js/addProductBasket.js',
            ],
            refresh: true,
        }),
    ],
});
