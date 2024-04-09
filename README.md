# PHP-Revision
This project is a simple employee management system where users can add, view, edit, and delete employee information. This serves as a practical introduction to PHP and MySQL.

## Built with
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" /> <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white"/> <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" /> <img src="https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white" /> <img src="https://img.shields.io/badge/VSCode-0078D4?style=for-the-badge&logo=visual%20studio%20code&logoColor=white" /> 

## CRUD Operations

### (a) Create

```php
//PHP script to insert data into the database (refer to register.php for more detailed code).

<?php
    if (isset ($_POST['emp_register'])) {
        if (empty ($_POST['emp_email']) || empty ($_POST['emp_name']) || empty ($_POST['emp_pass'])) {
            echo "<script>alert('Please fill in all fields')</script>";
        } else {

            $emp_email = $_POST['emp_email'];
            $emp_name = $_POST['emp_name'];
            $emp_pass = $_POST['emp_pass'];
            //$emp_pass = md5($_POST['emp_pass']); for encrypting
    
            $sql = "INSERT INTO emp_data (emp_email, emp_name, emp_pass) VALUES ('$emp_email', '$emp_name', '$emp_pass')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Employee added Successfully')</script>";
            } else {
                echo "Error:" . $sql . "<br/>" . mysqli_error($conn);
            }
        }
    }

    ?>
```

### (b) Read

```php
//PHP script to read data from the database (refer to viewemp.php for more detailed code).

 <?php

            $sql = "SELECT * FROM emp_data";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['emp_id'];
                    echo $row['emp_name'];
                    }
            } else {
                echo "<script>alert('Seems like it didn't go through')</script>";
            }
            ?>
```

### (c) Update

```php
//PHP script to update data in the database (refer to updateemp.php for more detailed code).

<?php
    $id = $_GET['emp_id'];

    if (isset ($_POST['emp_register'])) {

        $emp_email = $_POST['emp_email'];
        $emp_name = $_POST['emp_name'];

        $sql = "UPDATE emp_data SET emp_email='$emp_email', emp_name= '$emp_name' WHERE emp_id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Employee updated Successfully')</script>";
        } else {
            echo "Error:" . $sql . "<br/>" . mysqli_error($conn);
        }
    }
    ?>
```

### (d) Delete

```php
//PHP script to delete data from the database.

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
```
