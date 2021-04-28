<?php
include "dbcon.php";

$b_id = $_GET['id'];
$query = mysqli_query($con, "DELETE FROM book_tb WHERE id = '$b_id'");

if ($query) {

    $_SESSION['status'] = "Data Deleted Successfully 👍 ";
    $_SESSION['status_code'] = "success";

    header("location:admin.php");
} else {
    $_SESSION['status'] = "Data not Deleted 👎  ";
    $_SESSION['status_code'] = "error";
}
