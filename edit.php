<?php include("header.php"); ?>
<?php include("dbconn.php"); ?>



    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM `students` where `id` = '$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("query failed" . mysqli_error($connection));
        } else {
            //die("ID new is not set.");
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
        }
    }
    ?>

    <?php
    if (isset($_POST["edit_students"])) {

        $id = $_GET['id'];

        $first_name = mysqli_real_escape_string($connection,$_POST['f_name']);
        $last_name = mysqli_real_escape_string($connection,$_POST['l_name']);
        $age = mysqli_real_escape_string($connection,$_POST['age']);
        
        $query = "UPDATE `students` SET first_name = '$first_name', last_name = '$last_name', age = '$age' WHERE `id` = '$id'";
        $result = mysqli_query($connection, $query);
        
        

    if (!$result) {
        echo "Query failed: " . mysqli_error($connection);
    } else {
        header('Location: index.php?update_msg=You have successfully updated the data');
        exit(); // Make sure to exit after redirect
    }

    }


    ?>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for='f_name'>First Name</label>
            <input type="text" name="f_name" class="form-control" id="f_name" value="<?php echo $row['first_name']; ?>">
        </div>
        <div class="form-group">
            <label for='l_name'>Last Name</label>
            <input type="text" name="l_name" class="form-control" id="l_name" value="<?php echo $row['last_name']; ?>">
        </div>
        <div class="form-group">
            <label for='age'>Age</label>
            <input type="text" name="age" class="form-control" id="age" value="<?php echo $row['age']; ?>">
        </div>
        <div class="modal-footer"></div>
        <input type="submit" class="btn btn-success" name="edit_students" value="update">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"
            onclick="window.location.href='index.php'">Close</button> 
    </form>