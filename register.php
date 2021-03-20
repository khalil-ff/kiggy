<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Kiggy </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" type="image/png" href="images/icone.png" />



</head>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">KAT</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="search.php" accesskey="2" title="">Search</a></li>
				<li><a href="info.php" accesskey="3" title="">About Us</a></li>
				<li><a href="contact.php" accesskey="4" title="">Contact Us no don't</a></li>
			</ul>
		</div>
	</div>

	<div id="ins" class="container">
        <div class="button">
        <?php

        include_once 'includes/dbconnect.php';

        if(isset($_POST['submit']))
        {
          $username = htmlentities(trim($_POST['username']));
          $password = htmlentities(trim($_POST['password']));
          $repeatpassword = htmlentities(trim($_POST['repeatpassword']));
          $mail = htmlentities(trim($_POST['mail']));
          if($username&&$password&&$repeatpassword&&$mail)
          {
            if($password == $repeatpassword)
            {
              $password = md5($password);
              $reg = mysqli_query($connect, "SELECT * FROM users WHERE user_uid = '$username';");

              $rows = mysqli_num_rows($reg);

              if($rows == 0)
              {

              mysqli_query($connect, "INSERT INTO users (user_pwd, user_uid, user_email) VALUES('$password','$username','$mail');");
              die("Registered successfully <a href = 'login.php'>now log in</a>");

              }else echo"This username is already used by another user";
            }else echo"The passwords are not the fucking same";
          }else echo"Please fill in all the thingies";
        }

        ?>


        <form method = "POST" action = "register.php">
        <p> Your username : </p>
        <input type = "text" name = "username">
        <p> Your password : </p>
        <input type = "password" name = "password">
        <p> Repeat password : </p>
        <input type = "password" name = "repeatpassword">
        <p> email : </p>
        <input type = "text" name = "mail"></br></br>
        <ul class="actions">
          <a href="index.php" accesskey="1" title="">
            <input type="submit" value = "Valider" name = "submit">
          </a>
        </ul>
        </form>
    </div></br>
    <a href="index.php" class="button">Back to Homepage</a>
    </div>
</div>


<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p></br>
  <p> By the creators of POV : U're a cactus in the jurassic era </p>
</div>
</body>
</html>
