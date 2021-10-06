<?php
session_start();
require_once 'config/db.php';
if (!isset($_SESSION['id']) || $_SESSION['type'] != 1) {
    header("Location: index.php");
} else {
    $query = "SELECT * FROM students WHERE id='{$_SESSION['id']}'";
    $std = executeQuery($query, 2);
    $teachers = [];
    $teachInits = [];
    $query2 = "SELECT * FROM teachers";
    $result = $db->query($query2);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($teachers, $row);
        }
    }
    $teachInits = array_map(function ($t) {
        return "<option value=\"{$t['teacher_init']}\">{$t['teacher_init']}</option>";
    }, $teachers);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="css/application.css">
    <style>
    input {
        border-bottom: 1px solid block;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    input:focus {
        outline: none;
        border-bottom-color: lightblue;
    }
    </style>
</head>

<body>
    <form method="post" action="submit_application.php" class="web19201 anima-word-break ">
        <div style="width: 850px; height: 100%; position:relative; margin:auto;"><img class=overlapimg0
                src="overlap.jpg" alt="Image">
            <input name="date" type="date"class="rectangle11" required/>
            <select name="exam" class="rectangle44">
                <option value="Mid Term">Mid Term</option>
                <option value="Final">Final</option>
            </select>
            <input type="text" class="rectangle55" placeholder="Semister" required/>
            <input style="text-align: center;" type="text" class="rectangle22" value="<?php echo $std['name'] ?>" disabled/>
            <input name="semister" type="text" class="rectangle33" placeholder="Semister" required/>
            <input name="ICC" type="text" class="rectangle66" required/>
            <input name="ICN" type="text" class="rectangle77" required/>
            <select name="ITI" class="rectangle1010">
                <?php echo join("", $teachInits); ?>
            </select>
            <input name="ACC" type="text" class="rectangle99" required/>
            <input name="ACN" type="text" class="rectangle88" required/>
            <select name="ATI" class="rectangle1111">
                <?php echo join("", $teachInits); ?>
            </select>
            <select name="advisor" class="rectangle1212">
                <?php echo join("", $teachInits); ?>
            </select>
            <input type="text" class="rectangle1313" />
            <input type="text" class="rectangle1414" value="<?php echo $std['name'] ?>" disabled />
            <input name="std_id" type="text" class="rectangle1515" value="<?php echo $std['id'] ?>" disabled />
            <input name="std_section" type="text" class="rectangle1616" required/>
            <input type="text" class="rectangle1717" value="<?php echo $std['batch'] ?>" disabled />
            <input type="text" class="rectangle1718" value="<?php echo $std['phone'] ?>" disabled />
        </div>
        <div class="rectangle1719">
            <button type="submit">Submit Appliction</button>
        </div>
    </form>
</body>

</html>