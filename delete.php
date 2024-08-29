<?php include("dbconn.php");

$id = $_GET["id"];
$sql = "DELETE FROM `students` WHERE id=$id ";

if (mysqli_query($connection, $sql)) {
    //echo 'Id deleted successfully';
    header("Location: index.php");
    //return "index.php";
} else {
    echo 'Error deleting record: ' . mysqli_error($conn);
}