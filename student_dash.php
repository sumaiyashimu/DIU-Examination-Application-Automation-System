<?php
require_once 'config/db.php';
include_once 'header.php';
if (empty($_SESSION['id']) || $_SESSION['type'] != 1) {
    header("Location: index.php");
}

$improve_students = [];
$sql = "SELECT * FROM application WHERE std_id={$_SESSION['id']}";
$result = $db->query($sql);
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
        if ($row['ITApprove'] == 'Yes' && $row['ATApprove'] == 'Yes' && $row['AdvisorApprove'] == 'Yes') {

            $row['status'] = "Approved";


        } 
        
        else {
            $row['status'] = "Pending";
        }

        array_push($improve_students, $row);
    }
}
$improvement_rows = array_map(function ($s) {
    return "<tr><td>{$s['date']}</td><td>{$s['semister']}</td><td>{$s['exam']}</td><td>{$s['ICC']}</td><td>{$s['ICN']}</td><td>{$s['ACC']}</td><td>{$s['ACN']}</td> <td>{$s['ITApprove']}</td><td>{$s['ATApprove']}</td><td>{$s['AdvisorApprove']}</td>  <td>{$s['status']}</td></tr>";
}, $improve_students);

?>

<div class="title container">
    <h3>Student Dashboard</h3>
</div>

<ul class="pagination">
    <!-- <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li> -->
    <li class="active"><a href="routine.php" target="_blank">Routine</a></li> <br/><br/>
    <li class="active"><a href="student_application.php">Application</a></li>
    <!-- <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li> -->
  </ul>

  <div class="col s12">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Semister</th>
                    <th>Exam</th>
                    <th>Overlap_Course</th>
                    <th>Course_Tittle</th>
                    <th>Schedule_Corse_Code</th>
                    <th>Schedule_Course_Tittle</th>
                    <th>ITApproval</th>
                    <th>ATApproval</th>
                    <th>ADTApproval</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php echo join($improvement_rows); ?>
            </tbody>
        </table>
    </div>
