<?php require('header.php'); ?>
        <div class="container mt-4">
        <?php include('student/message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <!-- Header -->
                        <div class="card-header">
                            <form method="post">
                                <input type="text" class="search" name="search" placeholder="Search">
                                <button type="submit" name="submit" class="btn btn-primary" ">Search</button>
                            </form>
                            <a href="student/student-create.php" class="btn btn-primary float-end text-white">Add Students</a>
                        </div>

                        <!-- Body -->
                        <div class="card-body">

                            <!-- Table -->
                            <table class="table table-striped ">
                                <thead>
                                    <tr class="text-gray tr-head" >
                                        <th >ID</th>
                                        <th>Student Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Course</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    
                                    <?php 

                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);
                                    
                                    if(isset($_POST["submit"])){
                                        $str = $_POST["search"];
                                        $query = "SELECT * FROM students WHERE Name ='$str'";
                                        $query_run = mysqli_query($con, $query);
                                    }

                                        if(mysqli_num_rows($query_run) > 0){

                                        foreach($query_run as $student)
                                            {
                                                ?>
                                                <tr>
                                                    <td class="text-white" ><?= $student['id']; ?></td>
                                                    <td class="text-white"><?= $student['name']; ?></td>
                                                    <td class="text-gray word-break" ><?= $student['email']; ?></td>
                                                    <td class="text-gray" ><?= $student['phone']; ?></td>
                                                    <td class="text-gray" ><?= $student['course']; ?></td>
                                                    <td>
                                                        <a href="student/student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                        <a href="student/student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                        <form action="student/code.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else{
                                            echo "<h5> No Record Found </h5>";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require('footer.php'); ?>