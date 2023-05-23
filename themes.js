function toggleTheme() {
    // Get the <body> element
    var body = document.querySelector('body');
    // Check if the body has the 'dark-theme' class
    var isDark = body.classList.contains('dark-theme');
    // Toggle the 'dark-theme' and 'light-theme' classes
    body.classList.toggle('dark-theme', !isDark);
    body.classList.toggle('light-theme', isDark);
    // Set the 'theme' cookie to the opposite of the current value
    document.cookie = "theme=" + (isDark ? "light" : "dark") + "; expires=<?php echo date('D, d M Y H:i:s', time() + (7 * 24 * 60 * 60)); ?> GMT; path=/";
}