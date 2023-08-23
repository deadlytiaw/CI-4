<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
    
    <?php
    // Echo ession variables that were set on previous page
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favotite animal is " . $_SESSION["favanimal"] . ".";
    ?>
</body>
</html>