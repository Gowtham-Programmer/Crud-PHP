<?php include("header.php") ?>
<?php include("dbconn.php") ?>
<div class="box1">
    <h2>Student Records</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Students</button>
</div>
<table class="table table-hover tabel-bordered tabel-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "select * from `students`";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo "query failed" . mysqli_error($connection);
        } else {
            while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="edit.php?id=<?php echo $row['Id']; ?>" class="btn btn-success">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a></td>

                </tr>
                <?php
            }
        }

        ?>
    </tbody>
</table>

<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for='f_name'>First Name</label>
                        <input type="text" name="f_name" class="form-control" id="f_name" required>
                    </div>
                    <div class="form-group">
                        <label for='l_name'>Last Name</label>
                        <input type="text" name="l_name" class="form-control" id="l_name" required>
                    </div>
                    <div class="form-group">
                        <label for='age'>Age</label>
                        <input type="text" name="age" class="form-control" id="age" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="Add">
                </div>
            </div>

        </div>
    </div>
</form>
<?php include('footer.php') ?>