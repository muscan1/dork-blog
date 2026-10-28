<?php
// register.php
// Receives the registration form from google_dork_blog.html and replies with a result page.
// This code runs on the server BEFORE anything is sent to the browser.

// Variables start with $ and store values
$siteName = "Google Dorking Blog";
$postsPerMonth = 4;

// Arithmetic operator: * multiplies
$postsPerYear = $postsPerMonth * 12;

// These will hold the text shown on the page. They start empty.
$heading = "";
$message = "";
$tip = "";
$extra = "";

// A submitted form arrives as a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Read the submitted values. ?? "" means: use empty text if the value is missing
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $level = $_POST["level"] ?? "";

    // || means OR: the condition is true if either box is empty
    if ($name === "" || $email === "") {
        $heading = "Registration failed";
        $message = "Please go back and fill in your name and email.";
    } else {
        // switch: pick one tip depending on the chosen level
        switch ($level) {
            case "beginner":
                $tip = "Tip: start with the site: operator.";
                break;
            case "intermediate":
                $tip = "Tip: try combining site: and filetype:.";
                break;
            default:
                $tip = "Tip: explore intitle: and inurl: combinations.";
        }

        $heading = "Registration successful";

        // The dot (.) joins pieces of text together.
        // htmlspecialchars makes typed text safe to display on a page.
        $message = "Thanks for registering, " . htmlspecialchars($name) . "! Updates will go to " . htmlspecialchars($email) . ".";
        $extra = "We plan " . $postsPerYear . " posts a year, so expect about " . $postsPerMonth . " updates a month.";
    }

} else {
    // Someone opened this page directly instead of submitting the form
    $heading = "No form submitted";
    $message = "Please use the registration form on the blog.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration - <?php echo $siteName; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
    }

    header {
      background-color: #1a3c6e;
      color: white;
      padding: 20px;
      text-align: center;
    }

    main {
      max-width: 600px;
      margin: 30px auto;
      padding: 0 20px;
    }
  </style>
</head>
<body>

  <header>
    <h1><?php echo $siteName; ?></h1>
  </header>

  <main>
    <h2><?php echo $heading; ?></h2>
    <p><?php echo $message; ?></p>

    <?php
    // Only print these lines if they have content
    if ($tip !== "") {
        echo "<p>" . $tip . "</p>";
    }
    if ($extra !== "") {
        echo "<p>" . $extra . "</p>";
    }
    ?>

    <p><a href="google_dork_blog.html#register">Back to the blog</a></p>
  </main>

</body>
</html>