<?php

include "header.php";
include_once "includes/db.conn.php";

if(!isset($_SESSION['user'])) {
    header("Location: index.php?you must login");
    exit();
}

echo "<p class='searchMsg'>Your Uploads:</p>"

?>

<div id="mainImgPrev">

<?php

$sql = "SELECT * FROM image;";

$result = mysqli_query($conn, $sql);

if(!$result)
{
    echo 'Problem In Loading Images!';
}

while($row = mysqli_fetch_assoc($result)) {

    if($row['author'] == $_SESSION['nickname']) {
    $var = 'includes/uploads/'.$row['name'];
    $var2 = $row['name'];
    $author = $row['author'];

    echo '<div class="imgDiv">
    <form method="POST" action="includes/db.delete.php">
    <input type="text" hidden name="imgName" value='.$var2.'>
    <input type="checkbox" name="checkDelete">
    <a href='.$var.' download>
    <img class="img" width="200" height="200" src='.$var.' >
    </a>
    <p>'.$row["tag1"].", ".$row["tag2"].", ".$row["tag3"].'<br><br>Author:&nbsp&nbsp '.$author.'</p>
    <button class="deleteBtn" type="submit">Delete</button>
    </form>
    </div>';
    }
}

?>

</div>

</body>

</html>