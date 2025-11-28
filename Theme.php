<?php
// 1. If the form was submitted, read the POST data and set the cookie
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Read chosen theme from the form
  $chosenTheme = $_POST["theme"] ?? "epcc";

  // Set theme cookie for 7 days
  setcookie("theme", $chosenTheme, time() + 60*60*24*7);

  // Read nickname, store in cookie
  $nickname = $_POST["nickname"] ?? "";
  setcookie("nickname", $nickname, time() + 60*60*24*7);

  // Use chosen theme for THIS page load
  $theme = $chosenTheme;
} else {
  // 2. No form submission → read cookie or default "epcc"
  $theme = $_COOKIE["theme"] ?? "epcc";
}

// Read nickname cookie if it exists
$nickname = $_COOKIE["nickname"] ?? "";

// 3. Decide which CSS class to use for <body>
$bodyClass = ($theme == "thanksgiving") ? "thanksgiving" : "epcc";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Remember My Theme</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo $bodyClass; ?>">

  <h1>Remember My Theme</h1>

  <?php if ($nickname != ""): ?>
    <h2>Welcome back, <?php echo htmlspecialchars($nickname); ?>!</h2>
  <?php endif; ?>

  <p>Current theme: <?php echo $theme; ?></p>

  <form method="POST" action="theme.php">
    <p>Choose your theme:</p>

    <label>
      <input type="radio" name="theme" value="epcc">
      EPCC Day
    </label>

    <label>
      <input type="radio" name="theme" value="thanksgiving">
      Thanksgiving Night
    </label>

    <br><br>

    <input type="text" name="nickname" placeholder="Your nickname">

    <br><br>
    <button type="submit">Save my theme</button>
  </form>

</body>
</html>
