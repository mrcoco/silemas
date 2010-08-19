<?php

@require_once ('auth/auth.php');
@require_once ('ui/page.php');

?>

<div id="login-form">
 <form action="auth/" method="post">

<?php if (isLoggedIn ()) { ?>

  <input type="hidden" name="action" value="logout" />
  <input type="submit" value="Logout <?php echo isLoggedIn (); ?>" />

<?php } else { ?>

  <label for="uid">Username:</label>
  <input type="text" name="uid" id="uid" /><br />
  <label for="password">Password:</label>
  <input type="password" name="password" id="password" /><br />
  <input type="hidden" name="action" value="login" />
  <input type="submit" value="Login" />

<?php } ?>

 </form>
</div>

<?php endPage () ?>
