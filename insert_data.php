<?php include("dbconn.php");
if (isset($_POST["add_students"])) {
    // Retrieve form data safely
    $fname = isset($_POST['f_name']) ? trim($_POST['f_name']) : '';
    $lname = isset($_POST['l_name']) ? trim($_POST['l_name']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';

    // Validate form data
    if (empty($fname)) {
        header("Location: index.php?message=You need to fill the first name!");
        exit();
    }

    if (empty($lname)) {
        header("Location: index.php?message=You need to fill the last name!");
        exit();
    }

    if (empty($age)) {
        header("Location: index.php?message=You need to fill the age!");
        exit();
    }

    // Ensure age is a number
    if (!is_numeric($age)) {
        header("Location: index.php?message=Age must be a number!");
        exit();
    }

    // Insert data into the database
    // Assuming you have a $connection object
    $query = "INSERT INTO `students` (`first_name`, `last_name`, `Age` ) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($query);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }

    $stmt->bind_param("ssi", $fname, $lname, $age);

    if ($stmt->execute()) {
        header("Location: index.php?message=Student added successfully!");
    } else {
        header("Location: index.php?message=Failed to add student: " . htmlspecialchars($stmt->error));
    }

    $stmt->close();
    $connection->close();

    exit();
}

?>