<?php 
require_once ('config/db.php');

if(isset($_POST["std_submit"])){
    [
        'id' => $id, 
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'batch' => $batch,
        'phone' => $phone
    ] = $_POST;
    
    $query="INSERT INTO students(id, name, email, password, batch, phone) 
    VALUES ('$id','$name','$email','$password','$batch','$phone')";
    if(!executeQuery($query,1)) echo "Error in Registration";
    else echo "Registed Successfully";
}
?>
<!-- Signup Modal -->
<div id="signup_modal" class="modal">

    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s12" onclick="$('#stdModal').show(); $('#teacherModal').hide()"><a
                        href="#test1">Student</a></li>
                <!-- <li class="tab col s6" onclick="$('#stdModal').hide();$('#teacherModal').show()"><a class="active"
                        href="#test2">Teacher</a></li> -->

            </ul>
        </div>
    </div>

    <div id="stdModal">
        <h4 class="card-panel modal-header teal lighten-2"> student Sign UP</h4>
        <div class="modal-content">
            <form method="post" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="id" name="id" type="text" class="validate" required>
                        <label for="id">ID</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate" required>
                        <label for="name">Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate" required>
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="batch" name="batch" type="text" class="validate" required>
                        <label for="batch">Batch</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="phone" name="phone" type="number" class="validate" required>
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type="submit" name="std_submit" class="waves-effect waves-light btn"><i
                                class="material-icons right">send</i>Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>



<!-- Modal -->