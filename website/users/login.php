<?php

require_once("../include/users.php");
require_once("../include/html_functions.php");
require_once("../include/functions.php");

// login requires username and password both as POST. 
$bad_login = !(isset($_POST['username']) && isset($_POST['password']));
if (isset($_POST['username']) && isset($_POST['password']))
{
   if ($user = Users::check_login($_POST['username'], $_POST['password'], True))
   {
      Users::login_user($user['id']);
      if (isset($_POST['next']))
      {
	 http_redirect($_POST['next']);
      }
      else
      {
	 http_redirect(Users::$HOME_URL);
      }
   }
   else
   {
      $bad_login = True;
      $flash['error'] = "The username/password combination you have entered is invalid";
   }
}
if ($bad_login)
{
   our_header();

   ?>

<form action="<?=h( $_SERVER['PHP_SELF'] )?>" method="POST">
<?php error_message(); ?>
<h2>Login</h2>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1"  placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <input value="login" class="btn btn-default" type="submit" class="btn btn-primary"><br><a class="nav-link"  href="/users/register.php">Register</a></input>
</form>

   <?php

       our_footer();
}


?>