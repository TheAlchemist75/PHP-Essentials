<?php

$conn = mysqli_connect("localhost", "root", "", "employees");

if (mysqli_connect_errno() || !$conn) {
    printf("Unable to connect", mysqli_connect_error());
}