<?php
require_once 'config/db.php';
//session_start();
// $error = '';
if (isset($_POST["Loginsubmit"])) {
    [
        'email' => $email,
        'password' => $password,

    ] = $_POST;
    $query = "SELECT * FROM users WHERE email='{$email}' AND password ='{$password}'";
    $userType = (executeQuery($query, 2)['type']);
    $userId = (executeQuery($query, 2)['id']);
    if ($userType == 1) {
        $_SESSION['id'] = $userId;
        $_SESSION['type'] = 1;
        header("Location: student_dash.php");
    } else if ($userType == 2) {
        $_SESSION['id'] = $userId;
        $_SESSION['type'] = 2;
        header("Location: teacher_dash.php");
    } else if ($email == 'afsanaswe@diu.edu.bd' && $password == 'afsana@19') {
        $_SESSION['id'] = 'admin';
        $_SESSION['type'] = 0;
        header("Location: admin_dash.php");
    } else {
        echo "Username or Password is invalid";
      // $error = "Username or Password is invalid";
       
    }
}
?>
<!-- LOGIN Modal -->
 <div id="login_modal" class="modal">
            <h4 class="card-panel modal-header teal lighten-2">Login</h4>
            <div class="modal-content">
                <form method="post"  class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="login_email" type="email" name="email" class="validate">
                            <label for="login_email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="login_password" type="password" name="password" class="validate">
                            <label for="login_password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button type="submit" name="Loginsubmit" class="waves-effect waves-light btn"><i class="material-icons right">send</i>Login</button>
                        </div>
                    </div>
                    
                 
                </form>
            </div>
        </div>

        <!-- Modal -->