<?php
include("config.php");
?>
<html>
    <head>
    <title>Online Result</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body><br />
        <div align="center">
            <span class="head">Online Result System</span>
            <hr class="hr" />
            <br />
            <br />
            <span class="subhead">View Result</span>
            <br />
            <br />
            <br />
            <form method="post" action="viewResult.php">
                <table border="0" cellpadding="5" cellspacing="5" class="design">
                    <tr>
                        <td colspan="2" align="center" class="msg"><?php echo $msg;?></td>
                    </tr>
                    <tr>
                        <td class="labels">Register Number:</td>
                        <td><input type="text" required="required" name="roll" class="fields" size="15" placeholder="Enter Reg Num" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="DISPLAY" class="fields" /></td>
                    </tr>
                </table>
            </form>
            <br />
            <br />
            <a href="register.php"  class="link">Student Register</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="faculty.php"  class="link">Faculty Login</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="registerFaculty.php"  class="link">Faculty Registration</a>
        </div>
    </body>
</html>