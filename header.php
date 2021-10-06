<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlap | DIU</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Exo+2|Montserrat:300|Roboto|Lato:400,700|Pacifico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
    <header>
        <nav class="teal lighten-1">
            <div class="nav-wrapper">
                <!-- <a href="/" class="brand-logo">
                    <img src="img/logo-diu.png" height="60"
                        width="170">
                </a> -->
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <?php
if (!isset($_SESSION['id'])) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="#signup_modal" href="signup.html">Signup</a></li>
                    <li><a class="modal-trigger" href="#login_modal" href="login.html">Login</a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 2) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="teacher_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 1) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="student_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 0) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="admin_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                </ul>
EOD;
}

?>
            </div>
        </nav>

        <?php
if (!isset($_SESSION['id'])) {
    echo <<<EOD
<ul class="sidenav" id="mobile-demo">
                    <li><a class="modal-trigger" href="#signup_modal" href="signup.html">Signup</a></li>
                    <li><a class="modal-trigger" href="#login_modal" href="login.html">Login</a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 2) {
    echo <<<EOD
<ul class="sidenav" id="mobile-demo">
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="teacher_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 1) {
    echo <<<EOD
<ul class="sidenav" id="mobile-demo">
                    <li><a class="modal-trigger" href="student_application.php">Application</a></li>
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="student_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 0) {
    echo <<<EOD
<ul class="sidenav" id="mobile-demo">
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="admin_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                </ul>
EOD;
}

?>

    </header>