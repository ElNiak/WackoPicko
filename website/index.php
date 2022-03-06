<?php

require_once("include/html_functions.php");

?>

<?php our_header("home"); ?>

<div class="container">
<div class="row">
<div class="col-12" style="height:20px">
</div>
  <div class="col-12 col-md-8">
  <h2>Welcome to VeryNonExploitableWebSite</h2>
  <p>
    On VeryNonExploitableWebSite, you can share all your crazy pics with your friends. <br />
    But that's not all, you can also buy the rights to the high quality <br />
    version of someone's pictures. VeryNonExploitableWebSite is fun for the whole family.
  </p>

  </div>
  <div class="col-6 col-md-4">
  <h3>New Here?</h3>
  <div class="alert alert-primary" role="alert">
   <a class="alert-link" href="/users/register.php">Create an account</a>
  </div>
  <div class="alert alert-primary" role="alert">
    <a class="alert-link" href="/users/sample.php?userid=1">Check out a sample user!</a>
  </div>
  <div class="alert alert-primary" role="alert">
    <a class="alert-link" href="/calendar.php">What is going on today?</a>
  </div>
  </div>
  <div class="col-12">

  
    <h4>Or you can test to see if VeryNonExploitableWebSite can handle a file:</h4> <br />
  <script>
    document.write('<form class="form-inline my-2 my-lg-0" enctype="multipart/form-data" action="/pic' + 'check' + '.php" method="POST"><input type="hidden" name="MAX_FILE_SIZE" value="30000" />Check this file: <input name="userfile" type="file" /> <br />With this name: <input class="form-control mr-sm-2" name="name" type="text" /> <br /> <br /><input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Send File" /><br /> </form>');
  </script>
  </p>
  </div>
</div>
</div>
<div class="col-12" style="height:20px">
</div>
<?php our_footer(); ?>
