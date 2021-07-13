<?php
include "header.php";

if(isset($_SESSION['user'])) {
    header("Location: index.php?already-in");
}

?>



<form method="POST" action="includes/db.signup.php" class="signupForm">

<p>Signup</p>

<input type="text" placeholder="Username" name="username">
<input type="password" placeholder="Password" name="password">
<input type="password" placeholder="Repeat Password" name="rpassword">
<input type="text" placeholder="Nickname" name="nickname">
<br>
<button type="submit" >Sign Up </button>

</form>

</body>

</html>