# PHP-Revision
This project is a simple employee management system where users can add, view, edit, and delete employee information. This serves as a practical introduction to PHP and MySQL.

## Built with
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" /> <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white"/> <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" /> <img src="https://img.shields.io/badge/Xampp-F37623?style=for-the-badge&logo=xampp&logoColor=white" /> <img src="https://img.shields.io/badge/VSCode-0078D4?style=for-the-badge&logo=visual%20studio%20code&logoColor=white" /> 

## CRUD Operations

### Create

```php
// Create.php
// A simple PHP script to insert data into the database.

if(isset($_POST['submit'])) {
    include 'db_connect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $query = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    
    if($stmt->affected_rows > 0) {
        echo "Record added successfully.";
    } else {
        echo "An error occurred.";
    }
}
```
