<?php

require('validate.php');

if(isset($_POST['submit'])){
  $validation = new validate($_POST);
  $errors = $validation->validateForm();

  if ($validation == true && $errors == false){
    header("Location:dankjewel.php");
   
  }
}



?>





<!DOCTYPE html>
<html lang = "nl">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500&display=swap" rel="stylesheet">
    </head>

    <body>
    <header>
        <nav>
            <div class="switch">
                <div class="flicker"></div>
                <div class="moon"></div>
            </div>

            <div class= "navigation">
                <a href="index.html">Homepage</a>
                <a href="/">Projecten</a>
                <a href="contact.html" class="contact">Contact</a>
            </div>

        </nav>
    </header>
    <section class="main">
        <p>Wilt u meer weten of gewoon contact opnemen? 
            Maak dan gebruik van het contactformulier</p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="form">

            <label for="name">naam</label>
            <input type="text" name="name" >
            <div class="error">
                <?php echo $errors['name'] ?? '' ?>
            </div>
            <label for="email">email</label>
            <input type="email" name="email" >
            <div class="error">
                <?php echo $errors['email'] ?? '' ?>
            </div>
            <label for="bericht">bericht</label>
            <textarea id="bericht" name="bericht" rows="5" cols="21" ></textarea>
            <div class="error">
                <?php echo $errors['bericht'] ?? '' ?>
            </div>
            <input type="submit" value="verzenden" name="submit" class="submit">
        </form>

    </section>
    <script src="script.js"></script>
    </body>
</html>







