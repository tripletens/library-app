<?php
     require('./../../logics.php');
    class tests{
        private $server ="localhost";
        private $dbname = "library";
        private $user = "root";
        private $password = "";
        
        public $conn;
        function __construct(){
            $this->conn = mysqli_connect($this->server,$this->user,$this->password,$this->dbname);
            if(!$this->conn){
                echo mysqli_error();
            }else{
                return $this->conn;
            }
        }
        function work(){
            $d = strtotime("10:30pm");
            echo " Time i created is : " . date("h-i-sa",$d);
            echo date("Y-m-d");
            echo md5('hello');
        }
        public function joined(){

            $query = "SELECT * FROM reply_permissions ";
            $run_query = $this->conn->query($query);
            
            if($run_query){
                return $run_query ;
                
            }else{
                return false;
            }
        }
        public function joined_id($staff_id){

            $query = "SELECT * FROM reply_permissions where `staff_id` = '$staff_id'";
            $run_query = $this->conn->query($query);
            
            if($run_query){
                return $run_query ;
                
            }else{
                return false;
            }
        }
    }

    $obj = new tests;
    $view_permission = $obj->joined();
    
    
    
        # code...
        // echo count(mysqli_fetch_assoc($view_permission));
        // foreach (mysqli_fetch_assoc($view_permission) as $key => $value) {
        // # code...

           
    
    
    // if(isset($_GET['delitems'])){
    //     $query = mysqli_query("Delete from reply_permissions where `staff_id` = '{ $_GET['delitems']}'");
    //             or die('Error  : ' . mysqli_error($query));
    //     header('Location : ');
    // }

//                    if($attendance->record($fname,$lname,$staff_id,$time_in,$comment,$today_date)){
//                        $error = "<span class='alert alert-success'> Thanks for Coming Today - " . $today_date ."</span>";
//                    }else{
//                        $errror = "<span class='alert alert-danger'> Sorry Could not Sign Attendance. Contact Admin</span>";
//                    }




        // require('./../../logics.php');
                                        $permission = new permission();
                                            $id = 1;
                                            if($view_permission = $permission->joined()){

                                                // $select = $permission->view_staff_id($staff_id);
                                               
                                            $view_permission = $permission->joined();
                                            
                                            
                                            
                                            while ($rows = mysqli_fetch_assoc($view_permission)) {
                                                # code...
                                            
                                            // foreach ($rows as $row ) {

                                           
                                           

                                          
          
                                    ?>
                                    <tr>
                                        <td> <!-- <?//=  ?> --></td>
                                        <td><?= $rows['staff_name']?>  </td><br>
                                        <td><?= $rows['unit']?> </td><br>
                                        <td><?= $rows['campus']?> </td><br>
                                        <td><?= $rows['d_o_p']?> </td><br>
                                        <td><?= $rows['resume_date']?> </td><br>
                                        <td>
                                            <a href="<?= '?id=' . $rows['staff_id']. '&status=accepted'?> "><button class="msg btn btn-success" id="msg" value="<?=$row['staff_id']?>"> Accept </button></a>
                                            <a href="<?= '?id=' . $rows['staff_id'] . '&status=rejected'?> "><button class="msg btn btn-success" id="msg" value="<?=$row['staff_id']?>"> Reject </button></a>
                                        </td>
                                        
                                    </tr>
                                <?php



                            }}
                            if (isset($_GET['id']) && isset($_GET['status'])) {
                                # code...
                                //perform query
                                $staff_id = $_GET['id'];

                                $status = $_GET['status'];
                                $permission = new permission();

                                $permission->update_status($staff_id,$status);

                                echo "<script>confirm('Are you sure?','Yes','no');
                                                alert('success');
                                               window.location.href = 'http://localhost/library/admin/librarian/pages/tests.php'</script>";

                            };
                            // if (isset($_GET['id']) && isset($_GET['status'])) {
                            //     # code...
                            //     //perform query
                            //     $staff_id = $_GET['id'];
                            //     $status = $_GET['status'];
                            //     $permission = new permission();

                            //     $p = $permission->view_staff_id($staff_id);

                            //     while ($r = mysqli_fetch_assoc($p)) {
                            //         # code...
                            //         echo $r['status'];
                            //     }

                            //     echo "<script>alert('success');</script>";

                            // }
?>
<!-- <form method="GET" action="">
    
    <input type="submit" name="status" value="Accept">

</form> -->
<!-- if($select){
                                //                     while ($row = mysqli_fetch_assoc($view_permission)) {
                                //                    # code...
                                                
                                //                 echo "<tr class='gradeA'>
                                //                         <td> " .  $id . " </td>
                                //                         <td>" . $row['staff_name']."</td>
                                                        
                                //                         <td >" . $row['unit'] . " </td>
                                //                         <td >" . $row['campus'] . " </td> 
                                //                          <td >" . $row['d_o_p'] . " </td>
                                //                         <td >" . $row['resume_date'] . " </td>  
                                //                         <td >" .  " <button class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'> View Message </button>";
                                //                     ?>
                                // <form action='' method='GET'>
                                //     <div id='myModal' class='modal fade' role='dialog'>
                                //       <div class='modal-dialog'>

                                        
                                //         <div class='modal-content'>
                                //           <div class='modal-header'>
                                //             <button type='submit' class='close' data-dismiss='modal'>&times;</button>
                                //             <?php 
                                //             echo "<h4 class='modal-title'>". $row['subject'] ." </h4>
                                //           </div>
                                //           <div class='modal-body'>
                                //             <p>" . $row['comment'] . "</p>
                                //           </div>
                                //           ?>
                                //           <div class='modal-footer'>
                                          
                                //             <button type='submit' name='status' class='btn btn-success pull-left' data-dismiss='modal'>Accept</button>
                                            
                                //             <button type='button' name='status' class='btn btn-danger' data-dismiss='modal'>Decline</button>
                                            
                                //           </div>
                                //         </div>

                                //       </div>
                                     
                                //     </div>
                                //  </form>
                                //                          </td>    
                                //                     </tr>
                                //                         ";
                                //                  $id++;
                                //              }
                                //         }

                                //     } -->
