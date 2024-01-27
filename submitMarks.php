<?php
include("config.php");
session_start();
if (!isset($_SESSION['email'])) {
    header("location:index.php");
}
$email = $_SESSION['email'];
$a = mysqli_query($al, "SELECT * FROM faculty WHERE email='$email'");
$b = mysqli_fetch_array($a);
$name = $b['name'];
$sem = $b['sem'];
if (!empty($_POST)) {
    $roll = $_POST['roll'];
    $marks = array(
        's1' => $_POST['s1'],
        's2' => $_POST['s2'],
        's3' => $_POST['s3'],
        's4' => $_POST['s4'],
        's5' => $_POST['s5'],
        's6' => $_POST['s6']
    );
    if ($roll == NULL || in_array(NULL, $marks, true)) {
        //
    } else {
        $total = array_sum($marks);
        $percent = ($total / 600) * 100;
        if ($percent <= 35) {
            $result = "Fair";
        } elseif ($percent <= 50) {
            $result = "Good";
        } elseif ($percent <= 70) {
            $result = "Better";
        } else {
            $result = "Best";
        }
        $sql = mysqli_query($al, "INSERT INTO marks(roll,sem,s1,s2,s3,s4,s5,s6,total,percent,result) 
            VALUES('$roll','$sem','$marks[s1]','$marks[s2]','$marks[s3]','$marks[s4]','$marks[s5]','$marks[s6]','$total','$percent','$result')");
        if ($sql) {
            $msg = "Successfully Saved Marks";
        } else {
            $msg = "Marks Already Submitted to this Roll No.";
        }
    }
}
?>
<html>

<head>
    <title>Online Result</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <br />
    <div align="center">
        <span class="head">Online Result System</span>
        <hr class="hr" />
        <br />
        <br />
        <span class="subhead">Submit Marks</span>
        <br />
        <br />
        <?php
        $subjects = mysqli_query($al, "SELECT * FROM subjects WHERE sem='$sem'");
        $students = mysqli_query($al, "SELECT * FROM students WHERE sem='$sem'");
        ?>
        <form method="post" action="">
            <table border="0" cellpadding="5" cellspacing="5" class="design">
                <tr>
                    <td colspan="2" align="center" class="msg"><?php echo $msg; ?></td>
                </tr>
                <tr>
                    <td class="labels">Roll No. : </td>
                    <td>
                        <select name="roll" class="fields" style="background-color:#093d3d;" required>
                            <option value="" selected="selected" disabled="disabled">- - Select Roll - -</option>
                            <?php
                            while ($n = mysqli_fetch_array($students)) {
                                ?>
                                <option value="<?php echo $n['roll']; ?>"><?php echo $n['roll']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <?php
                while ($subject = mysqli_fetch_array($subjects)) {
                    ?>
                    <tr>
                        <td class="labels"><?php echo $subject['subject_name']; ?></td>
                        <td><input type="text" name="<?php echo $subject['subject_code']; ?>" class="fields" size="5" placeholder="20" required="required" /></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" align="center"><input type="submit" class="fields" value="Submit" /></td>
                </tr>
            </table>
        </form>
        <br />
        <br />
        <br />
        <a href="home.php" class="cmd">HOME</a>
    </div>
</body>

</html>
