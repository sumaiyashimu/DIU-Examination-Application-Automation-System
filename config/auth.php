<?php
$logged = isset($_SESSION['id']);
if ($logged) {
    $loggedUserType = $_SESSION['type'];
}
// if (!$logged) {
//     header("Location: index.php");
// }
