<?php
    session_start();

    require('./../../logics.php');
    
    if(isset($_POST['send_permission'])){
        
        $pday = $_POST['pday'];
        $pmonth = $_POST['pmonth'];
        $pyear = $_POST['pyear'];

        $subject = $_POST['subject'];
        $comment = $_POST['comment'];

        $rday = $_POST['rday'];
        $rmonth = $_POST['rmonth'];
        $ryear = $_POST['ryear'];
        
        //p day and p month
        if($pmonth < 10){
            $pmonth = "0". $pmonth;
        }
        if($pday < 10 ){
            $pday = "0" . $pday;
        }

        if($rmonth < 10){
            $rmonth = "0". $rmonth;
        }
        if($rday < 10 ){
            $rday = "0" . $rday;
        }
        $p_date = $pyear  . $pmonth . $pday ;

        $r_date = $ryear . $rmonth . $rday  ;
        echo $p_date;
        echo "</br>";
        echo $r_date;
        

        

        $user = new user();


        if(!empty($pday) && !empty($pmonth) && !empty($pyear) && !empty($subject) 
            && !empty($comment) && !empty($rday) && !empty($rmonth) && !empty($ryear)){

            $checkobject = new checks();

            $pday_checks = $checkobject->inputs($pday);

            $pmonth_checks = $checkobject->inputs($pmonth);

            $pyear_checks = $checkobject->inputs($pyear);

            $subject_checks = $checkobject->inputs($subject);

            $comment_checks = $checkobject->inputs($comment);

            $rday_checks = $checkobject->inputs($rday);

            $rmonth_checks = $checkobject->inputs($rmonth);

            $ryear_checks = $checkobject->inputs($ryear);

            if($pday_checks && $pmonth_checks && $pyear_checks && $subject_checks
                && $comment_checks && $rday_checks && $rmonth_checks && $ryear_checks){

                $permission =  new permission();
                $status= 1;
                // $user = new user();
                $conn = $user->__construct();
                $query = "INSERT INTO `permission`(`p_date`, `r_date`, `subject`, `comments`, `status`) VALUES ('$p_date','$r_date','$','$subject','$comment','$status')";
                $run_query = $conn->query($query);

                // if(isset($_SESSION['staff_id'])){

                //     $staff_id = $_SESSION['staff_id'];

                   
                // }else{
                //     echo "<script> window.location.href = './../../../login.php'; </script>";
                // }
                
                 if($conn->query($query)){
                        $error = "<span class='alert alert-success'>Request Successfully Sent </span>";
                    }else{
                        
                        $error = "<span class='alert alert-danger'> Sorry Could not Send Request. Contact Admin</span>";
                    }
                // if($permission ->user_exists($staff_id)){
                    // INSERT INTO `permission`(`id`, `p_date`, `r_date`, `subject`, `comments`, `status`, `date`) VALUES
                    
                    
                // }else{
                //     $error = "<span class='alert alert-danger'> User Not Registered </span>";
                // }
            }else{
                return false;
            }
        }else{
            $error = "<span class='alert alert-danger'> All Fields Required</span>";
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

    <title>Library</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <?php require('sidenav.php');?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="panel">
                <div class="panel-heading">
                    <h1> Upload Reports Here </h1>
                </div>
                <div class="panel-body">
                     <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label>Subject : </label>
                                    <input type="text" name="subject" class="form-control" placeholder="Enter Subject Here "><br>
                                    
                                </div>
                                <div class="form-group row">

                                    <label style="float: left;margin-left:15px;"> Date : </label>
                                    <input type="number" class="form-control col-md-4" name="pday" min="1" max="31" style="width: 15%;margin-left:10px;" placeholder="day"> 
                                    <input type="number" class="form-control col-md-4" style="width: 15%;margin-left:20px;"  name="pmonth"  min="1" max="12"  placeholder="month">  
                                    <input type="number" style="width: 15%;margin-left:20px; " class="form-control col-md-4" name="pyear"  min="2018" max="2090" placeholder="year">
                                </div>
                                <div class="form-group">
                                    <label for="upload"> Upload Document :</label>
                                    <input type="file" name="upload" placeholder="Upload Document" class="form-control">
                                </div>
                                <div class="form-group ">

                                    <label for="receiver"> Receiver : </label>
                                    <select name="receiver" class="form-control">
                                        <option name="receiver[]" value=""> --Select an Option --</option>
                                        <option name="receiver[]" value="unit head"> UNIT HEAD </option>
                                        <option name="receiver[]" value="librarian"> LIBRARIAN </option>
                                    </select>


                                </div>

                                <input class="btn btn-lg btn-success btn-block" name="send_permission" type="submit" value="Send Permission Request ">
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
