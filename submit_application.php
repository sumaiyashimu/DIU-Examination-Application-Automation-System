<?php
session_start();
require_once 'config/db.php';

if(preg_match('/(Summer |Spring |Fall )[2][0][0-9][0-9]/', $_POST['semister']) == 0) {
    echo "Semister is not Correct!\nPlease Input like <b>Spring 2020</b>";
    return;
}

$sql = <<<EOT
INSERT INTO application VALUES (
        '{$_POST['date']}',
        '{$_POST['exam']}',
        '{$_POST['semister']}',
        '{$_SESSION['id']}',
        '{$_POST['std_section']}',
        '{$_POST['ICC']}',
        '{$_POST['ICN']}',
        '{$_POST['ACC']}',
        '{$_POST['ACN']}',
        '{$_POST['ITI']}',
        '{$_POST['ATI']}',
        '{$_POST['advisor']}',
        0,
        0,
        0,
        0
    )
EOT;
if(!executeQuery($sql, 1)) ;
// echo "<div>Request Failed!</div><a href=\"student_dash.php\">Back to Home</a>";
// else {
//     echo "<div>Application Submitted!</div><a href=\"student_dash.php\">Back to Home</a>";
// }
