<?php

	 function update_status($staff_id,$status){
            $query = " UPDATE `reply_permissions` SET `status`= '$status' WHERE `staff_id` = '$staff_id'";
            $run_query = $this->conn->query($query);
            
            if($run_query){
                return $run_query;
                
            }else{
                return false;
            }
        }
?>