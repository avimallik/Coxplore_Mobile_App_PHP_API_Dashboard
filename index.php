<?php
	// Create database connection
    ob_start();
	include "dbconfig_coxplore.php";

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {


        $get_username=mysqli_real_escape_string($db, $_POST['admin_name']);
        $get_password=mysqli_real_escape_string($db, $_POST['password']);
        $sql="SELECT * FROM admin WHERE admin_name= '$get_username' AND password = '$get_password' ";

        if($result=mysqli_query($db,$sql)){

            if(mysqli_num_rows($result)==1){
                // header('Location:../admin/index.php');
                header('Location:dashboard_grid.php');
            }else{
                // header('Location:../index.php?login=wrong');
                echo '<script language="javascript">';
                echo 'alert("Wrong Admin Name & Password !")';
                echo '</script>';
            }               
        }else{
            // header('Location:../index.php?login=error');
            echo "empty";
        }               

  }

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-logo{
    position: relative;
    margin-left: -41.5%;
}
.login-logo img{
    position: absolute;
    width: 20%;
    margin-top: 19%;
    background: #282726;
    border-radius: 4.5rem;
    padding: 5%;
}
.login-form-1{
    padding: 9%;
    background:#282726;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color:#fff;
}
.login-form-2{
    padding: 9%;
    background: #f05837;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #fff;
}
.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd:hover{
    text-decoration:none;
    color:#fff;
}</style>

<center>
<div class="container login-container">
            <div class="row">
                <div class="col-md-12 login-form-1">
                    <h3>Coxplore Admin Login</h3>
                    <form method="POST" action="index.php">
                    
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" value="" name = "admin_name"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" value="" name = "password" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name = "upload"/>
                        </div>
                        </form>
                </div>
           
            </div>
        </div>
        </center>