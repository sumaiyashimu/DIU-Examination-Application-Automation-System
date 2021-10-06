<nav class="teal lighten-1">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">
                    <i class="material-icons" style="padding-left: 10px; margin-right: 8px;">
                        <img style="width: 200px; margin-right: 600px;   height: 60px;" src="img/logo-diu.png" height="120" width="120">
                    </i>
                </a>
                <?php
if (!isset($_SESSION['id'])) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="#signup_modal" href="signup.html">Signup</a></li>
                    <li><a class="modal-trigger" href="#login_modal" href="login.html">Login</a></li>
                    <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 2) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="teacher_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                    <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 1) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="student_application.php">Application</a></li>
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="student_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                    <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
                </ul>
EOD;
} else if ($_SESSION['type'] == 0) {
    echo <<<EOD
<ul class="right hide-on-med-and-down">
                    <li><a class="modal-trigger" href="index.php">Home</a></li>
                    <li><a class="modal-trigger" href="admin_dash.php">Dashboard</a></li>
                    <li><a class="modal-trigger" href="log_out.php">LogOut</a></li>
                    <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
                </ul>
EOD;
}

?>
            </div>
        </nav>