import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#39B9EC',   // Huisstijl blauw
                secondary: '#1E293B', // voorbeeld donkergrijs
                accent: '#F59E0B',    // voorbeeld oranje
                primary_blue: '#39B9EC',        // primary blue
                primary_pink: '#E72B76',        // primary pink
                secondary_blue: '#2ea6d6',      // secondary blue
                secondary_pink: '#c32363',      // secondary pink
                primary_yellow: '#CCD626',      // primary yellow
                secondary_yellow: '#F2B300',    // secondary yellow
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
