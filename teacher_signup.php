<?php 
require_once ('config/db.php');

if(isset($_POST["teacher-submit"])){
    [
        'tid' => $id, 
        'tname' => $name,
        'temail' => $email,
        'teacher_init' => $teacher_init,
        'tpassword' => $password,
    ] = $_POST;
    $query="INSERT INTO teachers(employee_id,name, email, teacher_init, password) 
    VALUES ('$id','$name','$email','$teacher_init','$password')";
    if(!executeQuery($query,1)) echo "Error in Registration";
    else echo "Registed Successfully";
}
?>


<div id="teacherModal" style="display: none">
    <h4 class="card-panel modal-header teal lighten-2"> teacher Sign UP</h4>
    <div class="modal-content">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="tid" name="tid" type="text" class="validate">
                    <label for="tid">Employee_ID</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="tname" name="tname" type="text" class="validate">
                    <label for="tname">Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="temail" name="temail" type="email" class="validate">
                    <label for="temail">Email</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="teacher_init" name="teacher_init" type="text" class="validate">
                    <label for="teacher_init">Teacher_Init</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="tpassword" name="tpassword" type="password" class="validate">
                    <label for="tpassword">Password</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <button type="teacher-submit" name="teacher-submit" class="waves-effect waves-light btn"><i
                            class="material-icons right">send</i>Register</button>
                </div>
            </div>
        </form>
    </div>
</div>