<?php

require "database.php";

$paper = $_GET['paperid'];
$action = $_GET['action'];
$rev_id = $_GET['revid'];

if (isset($paper) && isset($rev_id) && isset($action)) {

    if ($action = 'review') {

        $sql_email = "SELECT email,name FROM `reviewer`";

        $q = mysqli_query($connect, $sql_email);

        if ($q) {

            while ($row = mysqli_fetch_assoc($q)) {
                extract($row);

                $s = "SELECT name from `paper` WHERE `paper-id` = '$paper'";

                $p = mysqli_query($connect, $s);
                if ($p) {
                    $pname = mysqli_fetch_assoc($p);
                  
                    $msg = "Hello <span style='color:red;font-weight:bold;'>$name</span> you have recieved a new paper to review ";
                    $msg .= "download it from here ";

                    $msg .= "<a download='download' href='https://conference1779.000webhostapp.com/papers/".$pname['name']." ' style='color:blue;font-weight:bold;'>here</a>";

                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    $sent = mail($email, "paper review", $msg, $headers);

                    if ($sent) {
                        echo "email sent successfuly !";
                        
                    }

                }

            }

        } else {
            echo "error" . mysqli_error($connect);
        }

        $sql = "UPDATE paper
            set reviewed = '1' , `R-id` = '$rev_id' WHERE `paper-id` = '$paper' ;";
        if (mysqli_query($connect, $sql)) {
            echo "updated..!";
        } else {
            echo "error" . mysqli_error($connect);
        }
    }

}
