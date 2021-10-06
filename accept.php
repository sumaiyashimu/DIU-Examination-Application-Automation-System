<?php
session_start();
require_once 'config/db.php';
$id = $_GET['id'];
$ic = $_GET['ic'];
$ac = $_GET['ac'];
$t = $_GET['t'];
if ($t == 1) {
    $sql = "UPDATE application SET ITApprove = 1 WHERE std_id = '{$id}' AND ICC='$ic'";
    $section = "#improvement";
}
if ($t == 2) {
    $sql = "UPDATE application SET ATApprove = 1 WHERE std_id = '{$id}' AND ACC='$ac'";
    $section = "#attend";
}
if ($t == 3) {
    $sql = "UPDATE application SET AdvisorApprove = 1 WHERE std_id = '{$id}' AND ICC = '$ic' AND ACC = '$ac'";
    $section = "#advising";
}
if (executeQuery($sql, 1)) {
    header("Location: teacher_dash.php" . $section);
}
