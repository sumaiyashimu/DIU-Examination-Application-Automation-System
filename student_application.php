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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- es -->
    <link rel="stylesheet" href="bstrap/css/bootstrap.min.css">
    <script src="js/main.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Overlap | DIU</title>
    <style>
    .navbar {
        overflow: hidden;
        background-color: lightseagreen;
        font-family: Arial, Helvetica, sans-serif;
        height:66px;
    }

    .navbar a {
        float: Right;
        font-size: 14px;
        color: white;
        /* text-align: center; */
        padding: 16px 18px;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <div style="float:right;margin-left:75%;" class="row-12">
            <div class="col-12">
                <a href="log_out.php">LOGOUT</a>
                <a href="student_dash.php">DASHBOARD</a>
                <a href="index.php">HOME</a>
            </div>

        </div>
    </div>

    <!-- nav -->
    <div class="container">
        <div class="jumbotron" style="
    margin-left: 300px;
    margin-right: 100p;
    width: 75%;
    background-color: floralwhite;">
            <h1 style="text-align:center ">Overlap Exam Application Format</h1>
            <form method="post" >
                <div>
                    <input type="date" name="date" data-date="" data-date-format="DD MMMM YYYY" value="2020-06-19" >
                    (write date here)
                    <p></p>
                    <p>To <br>
                        The Member of Exam Committee,<br>
                        Software Engineering Department,<br>
                        Daffodil International University <br>
                        102, Sukrabad, Mirpur Road, Dhanmondi-1207
                    </p>
                    <p>
                        Subject: Application for attending the Overlap of<select name="exam">
                            <option value="Mid Term">Mid Term</option>
                            <option value="Final">Final</option>
                        </select> Exam in 
                        <select name="semister" id="sem"  required>

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
                        <!-- <input type="text" placeholder="Semister" name="sem" id="sem" onkeyup="form['semister'].value = this.value" required> -->
                    </p>

                    <p>
                        Dear Sir,<br>

                        I am <input style="text-align: center;" type=" text" value="<?php echo $std['name'] ?>"
                            disabled> , a regular student in your university. My
                        <!-- <input type="text" name="semister" onkeyup="form['sem'].value = this.value" placeholder="which semester you are" required> -->
                       
                        <select name="semister" id="sem"  required>
                       <option value="Spring 2020">Spring 2020</option>
                       <option value="Summer 2020">Summer 2020</option>
                       <option value="Fall 2020">Fall 2020</option>
                       <option value="Spring 2021">Spring 2021</option>
                       <option value="Summer 2021">Summer 2021</option>
                       <option value="Fall 2021">Fall 2021</option>
                       <option value="Spring 2022">Spring 2022</option>
                       <option value="Summer 2022">Summer 2022</option>
                       <option value="Fall 2022">Fall 2022</option>
                        </select> semester final
                        exam routine is published. This time after getting my exam
                        routine I have noticed that two of my courses are in the same day as well as same time slot. It
                        is not possible
                        for me to attend two courses in the same time.
                    </p>

                    <div>
                        <h1>Details for Overlap course:</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Acknowledgement</th>
                                    <th scope="col">Course
                                        Code</th>
                                    <th scope="col">Course title</th>
                                    <th scope="col">Teacher Initial</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">I will attend this
                                        course at the time
                                        of improvement
                                        exam</th>
                                    <td><input type="text" name="ICC" id="icc" required> </td>
                                    <td><input type="text" name="ICN" id="icn" required> </td>
                                    <td><select name="ITI">
                                            <?php echo join("", $teachInits); ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <th scope="row">I will attend this
                                        course at schedule
                                        time</th>
                                    <td><input type="text" name="ACC" id="acc" required> </td>
                                    <td><input type="text" name="ACN" id="acname" required></td>
                                    <td><select name="ATI">
                                            <!-- this is dropdown -->
                                            <?php echo join("", $teachInits); ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <th scope="row">I am informed that
                                        my student is
                                        attending Overlap
                                        Examination</th>
                                    <td colspan="2">Adviser Initial:</td>
                                    <td><select name="advisor">
                                            <?php echo join("", $teachInits); ?>
                                            <!-- this is dropdown -->
                                        </select> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>
                        Therefore, I pray and hope that you will be kind enough to permit me for attending overlap
                        course at the
                        time of Improvement.
                    </p>
                    Yours Obediently,
                </div>
                <table>
                    <tr>
                        <td>Student Name:</td>
                        <td><input type="text" value="<?php echo $std['name'] ?>" disabled></td>
                        </td>
                    </tr>

                    <tr>
                        <td>Student ID:</td>
                        <td><input type="email" value="<?php echo $std['id'] ?>" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td>Section:</td>
                        <td> <input type="text" name="std_section" id="section" required>

                        </td>
                    </tr>

                    <tr>
                        <td>Batch:</td>
                        <td><input type="text" value="<?php echo $std['batch'] ?>" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td>Mobile:</td>
                        <td><input type="number" value="<?php echo $std['phone'] ?>" disabled>
                        </td>
                    </tr>
                </table> <br>
                <div style="text-align: center;">
                    <button type="submit" value="submit" name="submit" onclick="check()">Submit Appliction</button>
                </div>


            </form>
        </div>
    </div>
</body>

</html>
<?php
              if(isset($_POST["submit"])){
               
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
executeQuery($sql, 1) ;

              }

?>