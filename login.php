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
      session_start();

	  include_once 'includes/dbconnect.php';

      if(isset($_POST['submit']))
      {
        $username = htmlentities(trim($_POST['username']));
        $password = htmlentities(trim($_POST['password']));

        if($username&&$password)
        {
          $password = md5($password);
          $query = mysqli_query($connect, "SELECT * FROM users WHERE user_uid = '$username' && user_pwd = '$password';");

		  $rows = mysqli_num_rows($query);

          if($rows == 1)
          {

            $_SESSION['username'] = $username;
            header('contact.php');

          }else echo"Pseudonyme ou mot de passe incorrect";
        }else echo"Veuillez saisir tous les champs";
      }

      ?>


      <form method = "POST" action = "login.php">
      <p> Your username : </p>
      <input type = "text" name = "username"></br></br>
      <p> Your password : </p>
      <input type = "password" name = "password"></br></br>
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
