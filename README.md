# PHP-Revision
This project is a simple employee management system where users can add, view, edit, and delete employee information. This serves as a practical introduction to PHP and MySQL.

## Built with
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" /> <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white"/> <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" /> <img src="https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white" /> <img src="https://img.shields.io/badge/VSCode-0078D4?style=for-the-badge&logo=visual%20studio%20code&logoColor=white" /> 

## CRUD Operations

### Create

```php
// A simple PHP script to insert data into the database.

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
