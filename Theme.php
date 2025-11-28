<?php

// 1. If the form was submitted, read the POST data and set the cookie

if ($_SERVER["REQUEST_METHOD"] == "POST") {


$nickname = $_POST["nickname"] ?? "";

setcookie("nickname", $nickname, time() + 60*60*24*7);


$chosenTheme = $_POST["theme"] ?? "epcc";


setcookie("theme", $chosenTheme, time() + 60*60*24*7);


// For this page load, use the chosen theme

$theme = $chosenTheme;

} else {

// 2. If no form submitted, read the cookie or use "epcc"

$theme = $_COOKIE["theme"] ?? "epcc";


$nickname = $_COOKIE["nickname"] ?? "";

}


// 3. Decide which CSS class to use for the <body>

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


<?php if ($nickname != "Gabe"): ?>

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

<button type="submit">Save my theme</button>


</form>

</body>

</html>