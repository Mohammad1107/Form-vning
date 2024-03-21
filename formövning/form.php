<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulär</title>
<link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>

<h2>Fyll i formuläret:</h2>
<div class="container">
<form action="submit.php" method="post" enctype="multipart/form-data">
  <label for="fname">Förnamn:</label><br>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Efternamn:</label><br>
  <input type="text" id="lname" name="lname"><br><br>
  <label for="bdate">Födelsedatum:</label><br>
  <input type="date" id="bdate" name="bdate"><br><br>
  <label for="image">Bild:</label><br>
  <input type="file" id="image" name="image"><br><br>
  <input type="submit" value="Show">
</form>
</div>
<div id="output">
  <!-- Här visas resultaten från PHP-filen -->
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $bdate = $_POST['bdate'];
  
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  
  echo "<h2>Dina uppgifter:</h2>";
  echo "<p><strong>Förnamn:</strong> $fname</p>";
  echo "<p><strong>Efternamn:</strong> $lname</p>";
  echo "<p><strong>Födelsedatum:</strong> $bdate</p>";
  echo "<p><strong>Bild:</strong> <img src='$target_file' alt='uploaded image' style='max-width: 200px;'></p>";
}
?>

</body>
</html>
