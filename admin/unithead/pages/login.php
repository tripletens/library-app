<?php
    require('../logics.php');
    
    if(isset($_POST['submit'])){
        
        $staff_id = $_POST['staff_id'];
        
        $password = $_POST['password'];
        
        $passwordhash = md5($password);
        
        //check if fields are empty 
        
        if(!empty($staff_id) && !empty($password)){
            //perform advanced checks 
            //call check class
            $checkobject = new checks();
            
            $staff_checks = $checkobject->inputs($staff_id);
            
            $password_checks = $checkobject->inputs($password);
            
            //check if user exists in db 
            $user = new user();
            if($staff_checks && $password_checks){
                if($user->user_exists($staff_id)){
                    //check email and password with  the one in db 
                    if($user->login($staff_id,$passwordhash)){
                        
//                        $row = mysqli_fetch_assoc($user>login($staff_id,$passwordhash));
//                        
//                            $_SESSION['staff_id'] = $row['staff_id'];
//                            $_SESSION['first_name'] = $row['last_name'];
//                            $_SESSION['last_name'] = $row['last_name'];
//                            $_SESSION['unit'] = $row['unit'];
//                            $_SESSION['authority'] = $row['authority'];

                        
                        $error = "<script> alert('Successfully Authenticated'); 
                            window.location.href = 'index.php'</script>";
                    }else{
                        $error = "<span class='alert alert-danger'>Staff Id/Password Combination Error. Contact Admin</span>";
                    }
                }else{
                    $error = "<span class='alert alert-danger'>Staff Not Registered. Contact Admin</span>";
                }
            }
            
            
        }else{
            $error = "<span class='alert alert-danger'>All fields Required</span>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Library App</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Staff Id" name="staff_id" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>
<!--
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
-->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login" name="submit">
                                <br>
                                <?php 
                                    if(isset($error)){
                                        echo $error;
                                    }
                                ?>
                            </fieldset>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
