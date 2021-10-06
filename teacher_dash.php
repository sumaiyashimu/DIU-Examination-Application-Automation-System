<?php
include 'header.php';
require_once 'config/db.php';
if (!isset($_SESSION['id']) || $_SESSION['type'] != 2) {
    header("Location: index.php");
}

$sql1 = "SELECT * FROM improvement where employee_id = {$_SESSION['id']}";
$sql2 = "SELECT * FROM attend where employee_id = {$_SESSION['id']}";
$sql3 = "SELECT * FROM advising where employee_id = {$_SESSION['id']}";
$semister = "All";
$exam = "All";
if (isset($_POST['exam']) && $_POST['exam'] != "All") {
    $selected_exam = $_POST['exam'];
    $exam = $selected_exam;
    $sql1 .= " and exam = '{$selected_exam}'";
    $sql2 .= " and exam = '{$selected_exam}'";
    $sql3 .= " and exam = '{$selected_exam}'";
}
if (isset($_POST['semister']) && $_POST['semister'] != "All") {
    $selected_semister = $_POST['semister'];
    $semister = $selected_semister;
    $sql1 .= " and semister = '{$selected_semister}'";
    $sql2 .= " and semister = '{$selected_semister}'";
    $sql3 .= " and semister = '{$selected_semister}'";
}

$improve_students = [];
$result = $db->query($sql1);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['ITApprove'] == 1) {
            $row['ITApprove'] = "Yes";
        } else {
            $row['ITApprove'] = "No";
        }

        if ($row['ATApprove'] == 1) {
            $row['ATApprove'] = "Yes";
        } else {
            $row['ATApprove'] = "No";
        }

        if ($row['AdvisorApprove'] == 1) {
            $row['AdvisorApprove'] = "Yes";
        } else {
            $row['AdvisorApprove'] = "No";
        }

        array_push($improve_students, $row);
    }
}
$improvement_rows = array_map(function ($s) {
    $table_cells = "<tr><td>{$s['std_id']}</td><td>{$s['name']}</td><td>{$s['email']}</td><td>{$s['ICC']}</td><td>{$s['ICN']}</td><td>{$s['batch']}</td><td>{$s['std_section']}</td><td>{$s['ITApprove']}</td><td>{$s['ATApprove']}</td><td>{$s['AdvisorApprove']}</td>";
    if($s['ITApprove'] != 'Yes') $table_cells .= "<td><a href=\"accept.php?id={$s['std_id']}&ic={$s['ICC']}&ac={$s['ACC']}&t=1\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Accept</a></tb></tr>";
    else $table_cells .= "<td><a href=\"reject.php?id={$s['std_id']}&ic={$s['ICC']}&ac={$s['ACC']}&t=1\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Reject</a></tb></tr>";
    return $table_cells;
}, $improve_students);

$attend_students = [];
$result = $db->query($sql2);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['ITApprove'] == 1) {
            $row['ITApprove'] = "Yes";
        } else {
            $row['ITApprove'] = "No";
        }

        if ($row['ATApprove'] == 1) {
            $row['ATApprove'] = "Yes";
        } else {
            $row['ATApprove'] = "No";
        }

        if ($row['AdvisorApprove'] == 1) {
            $row['AdvisorApprove'] = "Yes";
        } else {
            $row['AdvisorApprove'] = "No";
        }

        array_push($attend_students, $row);
    }
}
$attend_rows = array_map(function ($s) {
    $table_cells = "<tr><td>{$s['std_id']}</td><td>{$s['name']}</td><td>{$s['email']}</td><td>{$s['ACC']}</td><td>{$s['ACN']}</td><td>{$s['batch']}</td><td>{$s['std_section']}</td><td>{$s['ITApprove']}</td><td>{$s['ATApprove']}</td><td>{$s['AdvisorApprove']}</td>";
    if($s['ATApprove'] != 'Yes') $table_cells .= "<td><a href=\"accept.php?id={$s['std_id']}&ic={$s['ICC']}&ac={$s['ACC']}&t=2\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Accept</a></td></tr>";
    else $table_cells .= "<td><a href=\"reject.php?id={$s['std_id']}&ic={$s['ICC']}&ac={$s['ACC']}&t=2\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Reject</a></td></tr>";
    return $table_cells;
}, $attend_students);

$advising_students = [];
$result = $db->query($sql3);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['ITApprove'] == 1) {
            $row['ITApprove'] = "Yes";
        } else {
            $row['ITApprove'] = "No";
        }

        if ($row['ATApprove'] == 1) {
            $row['ATApprove'] = "Yes";
        } else {
            $row['ATApprove'] = "No";
        }

        if ($row['AdvisorApprove'] == 1) {
            $row['AdvisorApprove'] = "Yes";
        } else {
            $row['AdvisorApprove'] = "No";
        }

        array_push($advising_students, $row);
    }
}
$advising_rows = array_map(function ($s) {
    $table_cells = "<tr><td>{$s['std_id']}</td><td>{$s['name']}</td><td>{$s['ACC']}</td><td>{$s['ACN']}</td><td>{$s['ICC']}</td><td>{$s['ICN']}</td><td>{$s['batch']}</td><td>{$s['std_section']}</td><td>{$s['ITApprove']}</td><td>{$s['ATApprove']}</td><td>{$s['AdvisorApprove']}</td><td>";
    if($s['AdvisorApprove'] != "Yes") $table_cells .= "<a href=\"accept.php?id={$s['std_id']}&ic={$s['ICC']}&ac={$s['ACC']}&t=3\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Accept</a></tb></tr>";
    else $table_cells .= "<a href=\"reject.php?id={$s['std_id']}&ic={$s['ICC']}&ac={$s['ACC']}&t=3\" class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Reject</a></tb></tr>";
    return $table_cells;
}, $advising_students);
?>

<div class="title container">
    <h3>Teacher Dashboard</h3>
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
<div class="row">
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s4"><a class="active" href="#improvement">Overlap Exam Requests</a></li>
            <li class="tab col s4"><a href="#attend">Attendted Requests</a></li>
            <li class="tab col s4"><a href="#advising">Adviser Confarmations</a></li>
        </ul>
    </div>
    <div id="improvement" class="col s12">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Overlap_Course</th>
                    <th>Course_Tittle</th>
                    <th>Batch</th>
                    <th>Section</th>
                    <th>Overlap_Exam_ Approval</th>
                    <th>Schedule_Course_Approval</th>
                    <th>Advisor Approval</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php echo join($improvement_rows); ?>
            </tbody>
        </table>
    </div>
    <div id="attend" class="col s12">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th> Schedule_Course</th>
                    <th>Course_Tittle</th>
                    <th>Batch</th>
                    <th>Section</th>
                    <th>Overlap_Exam_ Approval</th>
                    <th>Schedule_Course_Approval</th>
                    <th>Advisor Approval</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php echo join($attend_rows); ?>
            </tbody>
        </table>
    </div>
    <div id="advising" class="col s12">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Schedule_Course</th>
                    <th>Course_Tittle</th>
                    <th>Overlap_Course</th>
                    <th>Course_Tittle</th>
                    <th>Batch</th>
                    <th>Section</th>
                    <th>Overlap_Exam_ Approval</th>
                    <th>Schedule_Course_Approval</th>
                    <th>Advisor Approval</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php echo join($advising_rows); ?>
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.tabs').tabs();
});
$(document).ready(function() {
    $('select').formSelect();
});
</script>
<?php include_once 'footer.php';?>

<!-- <a class=\"btn waves-effect waves-light\" type=\"submit\" name=\"action\">Reject</a> -->