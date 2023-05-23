<?php
// Check if the 'theme' cookie is set
if (isset($_COOKIE['theme'])) {
  $theme = $_COOKIE['theme'];
} else {
  // If the cookie is not set, default to the light theme
  $theme = 'light';
}

if ($theme === 'dark') {
  // If the 'theme' cookie is set to 'dark', use the dark theme
  echo '<body class="dark-theme">';
} else {
  // Otherwise, use the light theme
  echo '<body class="light-theme">';
}
?>

<button onclick="toggleTheme()">Toggle Theme</button>

<script>
function toggleTheme() {
  // Get the <body> element
  var body = document.querySelector('body');
  // Check if the body has the 'dark-theme' class
  var isDark = body.classList.contains('dark-theme');
  // Toggle the 'dark-theme' and 'light-theme' classes
  body.classList.toggle('dark-theme', !isDark);
  body.classList.toggle('light-theme', isDark);
  // Set the 'theme' cookie to the opposite of the current value
  document.cookie = "theme=" + (isDark ? "light" : "dark") + "; expires=<?php echo date('D, d M Y H:i:s', time() + (7 * 24 * 60 * 60)) . ' GMT'; ?>; path=/";
}
</script>

<style>
.light-theme {
  background-color: #fff;
  color: #333;
}

.dark-theme {
  background-color: #333;
  color: #fff;
}
</style>
