# Include Style/Script for specific page
###How to use this?

if you want to enqueue a style use this line of code then place in your specific php file.

**do_action( 'wp_enqueue_scripts', ['filename.css'] )**

First argument - a predefined hook of wordpress.

Second argument - an array which can you enqueue multiple file in specific page.

---

If you want to enqueue a javascript use this.

**do_action( 'wp_enqueue_scripts', ['filenam.js'], 'jquery', true )**

First argument - a predefined hook of wordpress.

Second argument - an array which can you enqueue multiple file in specific page.

Third argument - use this if you have javascript file that need a jQuery.

Fourth argument - use this if you want to place your javascript in footer.
