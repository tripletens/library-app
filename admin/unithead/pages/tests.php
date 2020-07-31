<?php
    class tests{
        function __construct(){
            $this->work();
        }
        function work(){
            $d = strtotime("10:30pm");
            echo " Time i created is : " . date("h-i-sa",$d);
            echo date("Y-m-d");
            echo md5('hello');
        }
    }
    $obj = new tests;
//                    if($attendance->record($fname,$lname,$staff_id,$time_in,$comment,$today_date)){
//                        $error = "<span class='alert alert-success'> Thanks for Coming Today - " . $today_date ."</span>";
//                    }else{
//                        $errror = "<span class='alert alert-danger'> Sorry Could not Sign Attendance. Contact Admin</span>";
//                    }
?>