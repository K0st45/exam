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
  echo "<body class='dark-theme'>";
} else {
  // Otherwise, use the light theme
  echo "<body class='light-theme'>";
}
?>