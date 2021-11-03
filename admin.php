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

        <div class="d-flex justify-content-center mt-5">
            <div class="card text-right" style="width: 40rem;">
                <div class="card-header">
                    
                    <h3 class="card-header card-header-rose p-2 pb-3 rounded text-white" style="font-weight: bold;font-family: cursive;margin-top: -10px;">RemApple</h3>
                    <ul class="nav nav-pills mb-3 card-header-pills mt-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" aria-selected="false">Sign up</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane fade show active" id="pills-login" >
                        <form id="login" method="post" action="">
                            <div class="form-group form-row bmd-form-group">
                                <label for="username" class="bmd-label-floating">Username</label>
                                <input class="form-control" id="username" name="username" type="text" required>
                            </div>
                            <div class="form-group form-row bmd-form-group">
                                <label for="password" class="bmd-label-floating">Password</label>
                                <input class="form-control" id="password" name="password" type="password" required>
                            </div>
                            <div class="form-group form-row bmd-form-group">
                                <button class="btn btn-success btn-block" id="loginbtn" name="loginbtn" type="submit">Login</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="pills-signup">
                        <form id="signup" autocomplete="off" method="post" action="" onsubmit="return validateme();">
                            <div class="form-group form-row bmd-form-group">
                                <label for="fullname" class="bmd-label-floating">Full Name</label>
                                <input class="form-control" id="fullname" name="fullname" type="text" required>
                            </div>
                            <div class="form-group form-row bmd-form-group">
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">                                    
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male"> Male
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>

                                </div>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female"> Female
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                              </div>
                              <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" id="transgender" value="transgender"> Transgender
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                          </div>
                            </div>
                            <div class="form-group form-row bmd-form-group">
                                <label for="phoneno" class="bmd-label-floating">Phone Number</label>
                                <input class="form-control" id="phoneno" name="phoneno" type="tel" maxlength="10" required>
                                <span id="validInfophn" style="display: none;">Please provide a valid phone number</span>
                            </div>
                            <div class="form-group form-row bmd-form-group">
                                <label for="spassword" class="bmd-label-floating">Password</label>
                                <input class="form-control" id="spassword" name="spassword" type="password" required>
                                <span id="validInfopass" style="display: none;">Password must be atleast 8-30 charactes long</span>
                            </div>
                            <div class="form-group form-row bmd-form-group">
                                <label for="cpassword" class="bmd-label-floating">Confirm Password</label>
                                <input class="form-control" id="cpassword" name="cpassword" type="password" required>
                                <span id="validInfocpass" style="display: none;">Password does not match</span>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" id="showpass" value=""> Show password
                                  <span class="form-check-sign">
                                      <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            <div class="form-group form-row bmd-form-group">
                                <button class="btn btn-success btn-block" id="signupbtn" name="signupbtn" type="submit">Signup</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var text=document.getElementById("fullname");
            text.addEventListener("keyup",function(){
                    text.value=text.value.toUpperCase();
            });
            var phoneno=document.getElementById("phoneno");
            phoneno.addEventListener("keyup",function(){
                var valid=/^[6-9]\d{9}$/;
                if(!valid.test(phoneno.value)){
                    phoneno.style.color="red";
                    phoneno.style.fontWeight="normal";
                }else{
                    phoneno.style.color="green";
                    phoneno.style.fontWeight="bold";
                }
                
            });
            var validate=/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\S+$).{8,30}$/;
            var pass=document.getElementById("spassword");
            var validinfo=document.getElementById("validInfopass");
            pass.addEventListener("keyup",function(){
                if(!validate.test(pass.value)){
                    validinfo.style.color="red";
                    validinfo.innerHTML="Password must be atleast 8-30 charactes long and a combination of numbers, alphabets (both upper and lower case) and special characters.";
                    validinfo.style.display="block";
                }else{
                    validinfo.innerHTML="Password Valid";
                    validinfo.style.color="green";
                    validinfo.style.fontWeight="bold";
                    validinfo.style.display="block";
                }
            })
            var cpass=document.getElementById("cpassword");
            var validInfocpass=document.getElementById("validInfocpass");
            cpass.addEventListener("keyup",function(){
                if(cpass.value===""){
                    validInfocpass.style.display="none";
                }
                else if(pass.value!=cpass.value){
                    validInfocpass.style.color="red";
                    validInfocpass.innerHTML="Password not matched!"
                    validInfocpass.style.display="block";
                }else{
                    validInfocpass.style.color="green";
                    validInfocpass.style.fontWeight="bold";
                    validInfocpass.innerHTML="Password Valid and Matched";
                    validinfo.style.display="none";
                    validInfocpass.style.display="block";
                }
            })

            var checkbox=document.getElementById("showpass");
            checkbox.addEventListener("click",function(){
                if(pass.type==="password" && cpass.type==="password"){
                    pass.type="text";
                    cpass.type="text";
                }else{
                    pass.type="password";
                    cpass.type="password";
                }
            })
            function validateme(){
                var male=document.getElementById("male"),
                female=document.getElementById("female"),
                transgender=document.getElementById("transgender"),
                phonenumber=document.getElementById("phoneno"),
                pass=document.getElementById("password"),
                cpass=document.getElementById("cpassword");
                
                if(!male.checked && !female.checked && !transgender.checked){
                    alert("Please select your Gender");
                    male.focus();
                    return false;
                }
                var valid=/^[6-9]\d{9}$/;
                if(!valid.test(phonenumber.value)){
                    alert("Enter Valid Phone Number");
                    phonenumber.focus();
                    return false;
                }
                var validate=/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\S+$).{8,30}$/;
                if(!validate.test(pass.value) && !validate.test(cpass.value) && pass.value!=cpass.value){
                    alert("Please enter valid password or check if both the password are match");
                    pass.focus();
                    return false;
                }

            }
        </script>



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
            
            $dbservername="localhost"; //sql105.epizy.com 
            $dbuser="root"; //epiz_29428490
            $dbpassword=""; //SDSrtCBe7M8wd

            $con=new mysqli($dbservername,$dbuser,$dbpassword);
            if($con->connect_error){
                die("Connection failed: ".$con->connect_error);
            }
            $sel=mysqli_select_db($con,"epiz_29428490_remdb");

            if(isset($_POST['loginbtn'])){
                $username=$_POST['username'];
                $password=$_POST['password'];

                $sql="SELECT * FROM `clients` where phoneNumber='$username'";
                $result = $con->query($sql);
                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) {
                        echo "Name: ".$row['fullName']."<br> Phone Number: ".$row['phoneNumber']."<br>Gender: ".$row['gender']."<br>";
                    }
                }else{
                    echo "<script>alert('User Not Found');</script>";
                }

                $con->close();


            }

            if(isset($_POST['signupbtn'])){
                $fullname=$_POST['fullname'];
                $gender=$_POST['gender'];
                $phoneno=$_POST['phoneno'];
                $password=$_POST['spassword'];
                

                if(!$sel){
                    echo "Error in selecting database";
                }

                $sql="INSERT INTO `clients` (`fullName`,`gender`,`phoneNumber`,`password`)
                    VALUES ('$fullname','$gender','$phoneno','$password')";
                
                if($con->query($sql)===true){
                    echo "<script>alert('SignUp Successfully')</script>";
                }else{
                    echo "<script>alert('SignUp Fail')</script>";
                }
                
                $con->close();
            }
    ?>




    </body>
</html>