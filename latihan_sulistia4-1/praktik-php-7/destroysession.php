<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    // remove all session variable
    session_unset();

    // destroy the session
    session_destroy();
    print_r($_SESSION);
    ?>
</body>
</html>