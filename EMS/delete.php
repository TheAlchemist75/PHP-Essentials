<?php

require 'conn.php';
$id = $_GET['emp_id'];
$sql = "DELETE FROM emp_data WHERE emp_id='$id'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Employee deleted Successfully')</script>";
    header("Location:dash.php");
} else {
    echo "<script>alert('Error deleting the data')</script>";
}