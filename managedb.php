<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./images/mtulogo-min.png">
        <link rel="icon" type="image/png" href="./images/mtulogo-min.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        
        <!-- CSS Files -->
<link href="./assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />


<!-- Fonts and icons -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

        <style>
            a:hover{
                cursor: pointer;
                user-select: none;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header card-header-rose">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="" class="nav-link active">Manage Your Basic Database</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="card-title">Database Management</div>
                            
                            <form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group bmd-form-group">
                                    <label for="" class="bmd-label-floating">
                                        Database Name to create
                                    </label>
                                        <input type="text" name="dbname" id="dbname" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group bmd-form-group">
                                        <input type="submit" name="sbtn1" id="sbtn1" class="btn btn-success" value="Create Database">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group bmd-form-group">
                                    <label for="" class="bmd-label-floating">
                                        Database Name to delete
                                    </label>
                                        <input type="text" name="deldbname" id="deldbname" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group bmd-form-group">
                                        <input type="submit" name="sbtn2" id="sbtn2" class="btn btn-danger" value="Delete Database">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group bmd-form-group">
                                    <label for="createtable" class="bmd-label-floating">Table Name</label>
                                   <input type="text" name="createtable" id="createtable" class="form-control">
                                   
                               </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group bmd-form-group">
                                    <label for="selectdb" class="bmd-label-floating">Select Database</label>
                                   <input type="text" name="selectdb" id="selectdb" class="form-control">
                               </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group bmd-form-group">
                                    <input id="sbtn3" name="sbtn3" type="submit" class="btn btn-info" value="Create Table">
                                </div>
                            </div>
                        </div>
                        
                        </form>
                </div>
            </div>
        </div>



    





        <!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>








<?php
        $server="localhost";
        $username="root";
        $password="";

        // create connection
        $conn = new mysqli($server,$username,$password);
        // check connection
        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }

        if(isset($_POST['sbtn1'])){
            $dbname=$_POST['dbname'];

            $sql="CREATE DATABASE $dbname";
            if($conn->query($sql)===true){
                echo '<script type="text/javascript">
                    alert("Database created successfully");
                </script>';
            }else{
                echo '<script type="text/javascript">
                alert("Error creating database:");
            </script>';
            }
        }
        if(isset($_POST['sbtn2'])){
            $deldbname=$_POST['deldbname'];

            $sql="DROP DATABASE $deldbname";
            if($conn->query($sql)===true){
                echo '<script type="text/javascript">
                    alert("Database deleted successfully");
                </script>';
            }else{
                echo '<script type="text/javascript">
                alert("Error deleting database:");
            </script>';
            }
        }
        if(isset($_POST['sbtn3'])){
            $selectdb=$_POST['selectdb'];
            $tablename=$_POST['createtable'];

            $sel=mysqli_select_db($conn,$selectdb);
            if(!$sel){
                die("Error selecting database");
            }
            $sql="CREATE TABLE $tablename(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
            
            if(mysqli_query($conn,$sql)){
                echo '<script type="text/javascript">
                alert("Table created successfully");
            </script>';
            }else{
                echo '<script type="text/javascript">
                alert("Error creating table");
            </script>';
            }

        }
        $conn->close();
    ?>
    </body>
</html>