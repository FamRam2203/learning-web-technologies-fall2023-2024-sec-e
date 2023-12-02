<?php
// Assuming you have a MySQL database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a new employee
function addEmployee($conn, $employee_name, $contact_no, $username, $password) {
    $sql = "INSERT INTO employees (name, contact_no, username, password) VALUES ('$employee_name', '$contact_no', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Employee added successfully!";
    } else {
        echo "Error adding employee: " . $conn->error;
    }
}

// Function to update an employee
function updateEmployee($conn, $id, $employee_name, $contact_no, $username, $password) {
    $sql = "UPDATE employees SET name='$employee_name', contact_no='$contact_no', username='$username', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Employee updated successfully!";
    } else {
        echo "Error updating employee: " . $conn->error;
    }
}

// Function to search for an employee
function searchEmployee($conn, $searchTerm) {
    $sql = "SELECT * FROM employees WHERE name LIKE '%$searchTerm%' OR username LIKE '%$searchTerm%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Contact No: " . $row["contact_no"]. " - Username: " . $row["username"]. "<br>";
        }
    } else {
        echo "No results found.";
    }
}

// Check the action parameter from the AJAX request
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'addEmployee':
            addEmployee($conn, $_POST['name'], $_POST['contactNo'], $_POST['username'], $_POST['password']);
            break;

        case 'updateEmployee':
            updateEmployee($conn, $_POST['id'], $_POST['name'], $_POST['contactNo'], $_POST['username'], $_POST['password']);
            break;

        case 'searchEmployee':
            searchEmployee($conn, $_GET['searchTerm']);
            break;

        default:
            echo "Invalid action.";
            break;
    }
}

$conn->close();
?>
