<?php

require_once("users.php");
require_once("functions.php");
session_start();

function our_header($selected = "", $search_terms = "")
{

   ?>
<html>
  <head>
    <link rel="stylesheet" href="/css/blueprint/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="/css/blueprint/print.css" type="text/css" media="print">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--[if IE]><link rel="stylesheet" href="/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
    <link rel="stylesheet" href="/css/stylings.css" type="text/css" media="screen">
    <title>VeryNonExploitableWebSite.com</title>
  </head>
  <body>
    <div class="container " style="border: 2px solid #5c95cf;">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a id="title" class="navbar-brand" href="/">VeryNonExploitableWebSite.com</a></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active <?php if($selected == "home"){ echo 'current'; } ?>">
                <a class="nav-link" href="/users/home.php"><span>Home</span><span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item <?php if($selected == "upload"){ echo 'current'; } ?>">
                <a class="nav-link" href="/pictures/upload.php"><span>Upload</span></a>
              </li>
              <li class="nav-item <?php if($selected == "recent"){ echo 'current'; } ?>">
                <a class="nav-link" href="/pictures/recent.php"><span>Recent</span></a>
              </li>
              <li class="nav-item <?php if($selected == "guestbook"){ echo 'current'; } ?>">
                <a class="nav-link" href="/guestbook.php"><span>Guestbook</span></a>
              </li>
              <?php if (Users::is_logged_in()) { ?>
                <li class="nav-item <?php if($selected == "cart"){ echo 'current'; } ?>">
                <a class="nav-link" href="/cart/review.php"><span>Cart</span></a></li> 
              <?php } ?>
              <?php if (Users::is_logged_in()){ ?>
                <li class="nav-item" ><a class="nav-link" href="/users/logout.php"><Span>Logout</span></a></li>
              <?php } else { ?>
                <li class="nav-item" ><a class="nav-link" href="/users/login.php"><Span>Login</span></a></li>
              <?php } ?>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/pictures/search.php" method="get">
              <input name="query" type="text" class="form-control" id="query2" placeholder="Search" value="<?=h($search_terms) ?>"/>
              <input src="/images/search_button_white.gif" type="image" style="border: 0pt none ; position: relative; top: 0px;vertical-align:middle;margin-left: 1em;" />
            </form>
          </div>
        </nav>
   <?php
}

function error_message()
{
   global $flash;
   if ($flash['error'])
   {
      ?>
<p class="span-10 error">
	 <?= h($flash['error']) ?>
</p>
      <?php
   }
}

function our_footer()
{
   ?>
       <div class="column span-24 first last" id="footer" >
	<ul>
	  <li><a href="/">Home</a> |</li>
          <li><a href="/admin/index.php?page=login">Admin</a> |</li>
	  <li><a href="mailto:contact@benoitlove.com">Contact</a> |</li>
	  <li><a href="/tos.php">Terms of Service</a></li>
	</ul>
      </div>
    </div>
  </body>
</html>
   <?php

}

function thumbnail_pic_list($pictures, $high_quality = False)
{
   ?>
<div class="column prepend-1 span-21 first last" style="margin-bottom: 2em;">
      <?php if ($pictures) { ?>
<ul class="thumbnail-pic-list">
<?php
   for ($i = 0; $i < count($pictures); $i++)
   {
      $link_to = '';
      if (!$high_quality)
      {
        $link_to = Pictures::$VIEW_PIC_URL . "?";
      }
      else
      {
        $link_to = Pictures::$HIGH_QUALITY_URL . "?";
      }
      $pic = $pictures[$i];
      if ($i != 0 && (($i % 4) == 0))
      {
	 ?>
</ul>
</div>
<div class="column prepend-1 span-21 first last" style="margin-bottom: 2em;">
<ul class="thumbnail-pic-list">
	 <?php
      }
$link_to = $link_to . "picid=" . $pic['id'];
if ($high_quality)
{
  $link_to = $link_to . "&key=" . urlencode($pic['high_quality']);
}
?>
<li>
<a href="<?=h($link_to) ?>"><img src="/upload/<?=h( $pic['filename']) ?>.128_128.jpg" height="128" width="128" /></a>
</li>
<?php

   }
?>
<?php }
   else { ?>
<h3 class="error">No pictures here...</h3>


<?php } ?>
</ul>
</div>
<?php
}

function high_quality_item_link($item)
{
   $name = url_origin($_SERVER);
   $high_quality_encoded = urlencode($item['high_quality']);
   $link = $name . Pictures::$HIGH_QUALITY_URL . "?picid={$item['id']}&key={$high_quality_encoded}";
   return "<a href='{$link}'>{$link}</a>";
}


?>