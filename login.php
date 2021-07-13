<?php
include "header.php";


if(isset($_SESSION['user'])) {
    header("Location: index.php?already-in");
}

?>



<form method="POST" action="includes/db.login.php" class="loginForm">

<p>Login</p>

<input type="text" placeholder="Username" name="username">
<input type="password" placeholder="Password" name="password">
<br>
<button type="submit" >Login</button>

</form>

</body>

</html>