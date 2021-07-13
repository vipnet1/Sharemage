
<?php
include "header.php";

if(!isset($_SESSION['user'])) {
    header("Location: index.php?you must login");
    exit();
}

?>

<form method="POST" action="includes/db.upload.php" class="loginForm" enctype="multipart/form-data">

<p>Upload</p>

<input type="file" name="file">
<br>
<input type="text" placeholder="tag1" name="tag1">
<input type="text" placeholder="tag2" name="tag2">
<input type="text" placeholder="tag3" name="tag3">
<button type="submit" >Upload</button>

</form>

<script src="code.js" ></script>

</body>

</html>