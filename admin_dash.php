<?php
require_once 'config/db.php';
include 'header.php';
if (!isset($_SESSION['id']) || $_SESSION['type'] != 0) {
    header("Location: index.php");
}

$sql = "SELECT * FROM improvement WHERE ITApprove = 1 AND ATApprove = 1 AND AdvisorApprove = 1";
$semister = "All";
$exam = "All";
if (isset($_POST['exam']) && $_POST['exam'] != "All"){
    $selected_exam = $_POST['exam'];
    $exam = $selected_exam;
    $sql .= " and exam = '{$selected_exam}'";
}
if (isset($_POST['semister']) && $_POST['semister'] != "All"){
    $selected_semister = $_POST['semister'];
    $semister = $selected_semister;
    $sql .= " and semister = '{$selected_semister}'";
}

// if (isset($_POST['exam'])){
//     $selected_exam = $_POST['exam'];
//     $sql = "SELECT * FROM improvement WHERE ITApprove = 1 AND ATApprove = 1 AND AdvisorApprove = 1 AND exam = '" . $selected_exam . "' ";

// }else{
//     $sql = "SELECT * FROM improvement WHERE ITApprove = 1 AND ATApprove = 1 AND AdvisorApprove = 1";
// }

$improve_students = [];
$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($improve_students, $row);
    }
}
$improvement_rows = array_map(function ($s) {
    return "<tr><td>{$s['std_id']}</td><td>{$s['name']}</td><td>{$s['ICC']}</td><td>{$s['ICN']}</td><td>{$s['ACC']}</td><td>{$s['ACN']}</td><td>{$s['batch']}</td><td>{$s['std_section']}</td></tr>";
}, $improve_students);

?>

<div class="title container">
    <h3>Admin Dashboard</h3>
</div>

<div class="container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div>Select File to Upload</div><br>
        <div class="input-field">
            <input type="file" name="data_file" id="data_file">
        </div>
        <input class="btn" type="submit" value="Upload Image" name="submit">
    </form>
</div>
<form method="post" class="row">
    <div class="input-field col s5 m3 l3">
    <select name="semister">
            <option selected disabled>Select Semister</option>
            <option value="All">All</option>
            <option value="Spring 2020">Spring 2020</option>
            <option value="Summer 2020">Summer 2020</option>
            <option value="Fall 2020">Fall 2020</option>
            <option value="Spring 2021">Spring 2021</option>
            <option value="Summer 2021">Summer 2021</option>
            <option value="Fall 2021">Fall 2021</option>
            <option value="Spring 2022">Spring 2022</option>
            <option value="Summer 2022">Summer 2022</option>
            <option value="Fall 2022">Fall 2022</option>
        </select>
    </div>
    <div class="input-field col s5 m3 l3">
        <select name="exam">
            <option selected disabled>Select Exam</option>
            <option value="All">All</option>
            <option value="Mid Term">Mid Term</option>
            <option value="Final">Final</option>
        </select>
    </div>
    <div class="input-field col s2 m3 l3">
        <button type="submit" class="btn waves-effect waves-light">Find</button>
    </div>
</form>
<div class="container">
    <h6>Semister: <?php echo $semister; ?> | Exam: <?php echo $exam; ?></h6>
</div>

<div class="col s12">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Improvement_Course_Code</th>
                    <th>Improvement_Course_Tittle</th>
                    <th>Schedule_Course_Code</th>
                    <th>Schedule_Course_Tittle</th>
                    <th>Batch</th>
                    <th>Section</th>
                </tr>
            </thead>
            <tbody>
                <?php echo join($improvement_rows);?>
            </tbody>
        </table>
    </div>

<script>
$(document).ready(function() {
    $('select').formSelect();
});
</script>