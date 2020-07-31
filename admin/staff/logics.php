<?php
    class db{
        private $server ="localhost";
        private $dbname = "library";
        private $user = "root";
        private $password = "";
        
        public $conn;
        
        
        function __construct(){
            $this->connect();
            
        }
        public function connect(){
            $this->conn = mysqli_connect($this->server,$this->user,$this->password,$this->dbname);
            if(!$this->conn){
                echo mysqli_error();
            }else{
                return $this->conn;
            }
        }
    }
    class user extends db{
        public $error;
        function __construct(){
            $this->conn = $this->connect();
            return $this->conn;
        }
        
        public function login($staff_id,$passwordhash){
            $query = "SELECT `id`, `staff_id`, `first_name`, `last_name`, `unit`, `authority`, `password`, `cpassword`, `date` FROM `register_user` where `staff_id` = '$staff_id' && `password` = '$passwordhash'";
            
            $run_query = $this->conn->query($query);
            if($run_query){
                return $run_query;
                return true;
            }else{
                return false;
            }
        }
        public function create_user($staff_id ,$fname, $lname, $unit , $authority, $password , $cpassword){
            //insert query 
            $passwordhash = md5($password);
            $cpasswordhash = md5($cpassword);
            
            $staff_id = strtolower($staff_id);
            $fname = strtolower($fname);
            $lname = strtolower($lname);
            $unit = strtolower($unit);
            $authority =strtolower($authority);
            $password = strtolower($password);
            $cpassword = strtolower($cpassword);

            $insert_query = "INSERT INTO `register_user`(`staff_id`, `first_name`, `last_name`, `unit`, `authority`, `password`, `cpassword`) VALUES ('$staff_id','$fname','$lname','$unit','$authority','$passwordhash','$cpasswordhash')";
            
             $run_insert_query = $this->conn->query($insert_query);
                if($run_insert_query){
                    return true;
                }else{
                   return false;
                    
                }
        }
        public function edit_user($staff_id ,$fname, $lname, $unit , $authority, $password , $cpassword){
            //update query
            $passwordhash = md5($password);
            $cpasswordhash = md5($cpassword);

            $staff_id = strtolower($staff_id);
            $fname = strtolower($fname);
            $lname = strtolower($lname);
            $unit = strtolower($unit);
            $authority =strtolower($authority);
            $password = strtolower($password);
            $cpassword = strtolower($cpassword);

            $update_query = "UPDATE `register_user` SET `first_name`= '$fname' , `last_name`='$lname' ,
                             `unit`='$unit', `authority` = '$authority' , `password` = '$passwordhash' , `cpassword` = '$cpasswordhash' where `staff_id` = '$staff_id'";
            if($run_query = $this->conn->query($update_query)){
                return true;
            }else{
                return false;
            }
        }
        public function delete_user($staff_id){
            //update query
            
            $staff_id = strtolower($staff_id);
          

            $delete_query = "DELETE FROM `register_user` where `staff_id` = '$staff_id'";
            if($run_query = $this->conn->query($delete_query)){
                return true;
            }else{
                return false;
            }
        }
         public function user_exists($staff_id){

             //select user from db 
            $select_query  = "SELECT `id`, `staff_id`, `unit`, `password`, `cpassword` FROM `register_user` WHERE `staff_id` = '$staff_id'";
            //check if user exists 
            $run_select_query = $this->conn->query($select_query);
            if($run_select_query){
                //check if user already exists 
                if(mysqli_num_rows($run_select_query) == 0){
                    //check if 
                    return false;
                }else{
                    return true;
                }
            }
        }
        public function user_not_exists($staff_id){
             //select user from db 
            $select_query  = "SELECT `id`, `staff_id`, `unit`, `password`, `cpassword` FROM `register_user` WHERE `staff_id` = '$staff_id'";
            //check if user exists 
            $run_select_query = $this->conn->query($select_query);
            if($run_select_query){
                //check if user already exists 
                if(mysqli_num_rows($run_select_query) == 0){
                    //check if 
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function password_match($password,$cpassword){
            
            if($password == $cpassword){
                
                return true;
                
            }else{
                return false;
            }
            
        }
        public function password_length($password,$cpassword){
            
            $pass_length = strlen($password);
            
            $cpass_length = strlen($cpassword);
            
            if(($pass_length >= 8) && ($cpass_length >= 8)){
                return true;
            }else{
                return false;
            }
        }
    }
    class checks{
        
        public $fields;
        
        function __construct(){
//            $this->inputs($value);
        }
        public function inputs($value){
            
            $trim = trim($value);
            
            $strip = stripslashes($trim);
            
            $final = htmlspecialchars($strip);
            
            return $final;
        }
    }
    class book extends db{
        
        function __construct(){
            $this->conn = $this->connect();
        }
        public function addbook( $title , $description , $department ,$faculty , $author, $publisher ){
            $title  = strtolower($title);
            $description = strtolower($description);
            $faculty  = strtolower($faculty);
            $author = strtolower($author);
            $publisher =strtolower($publisher);
            
            $add_query = "INSERT INTO `books`(`title`, `description`, `department`, `faculty`, `author`, `publisher`) VALUES ('$title' , '$description' , '$department' ,'$faculty','$author','$publisher')";
            
            $run_add_query = $this->conn->query($add_query);
                if($run_add_query){
                    return true;
                }else{
                   return false;
                    
                }
            
        }
        public function book_not_exists($title){
            //select book from db 
            $select_query  = "SELECT `id`, `title`, `description`, `department`, `faculty`, `author`, `publisher`, `date` FROM `books` WHERE `title`='$title'";
            //check if book exists 
            $run_select_query = $this->conn->query($select_query);
            if($run_select_query){
                //check if book already exists 
                if(mysqli_num_rows($run_select_query) == 0){
                    
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function viewbooks(){
            $view_query = "SELECT `id`,`title`, `description`, `department`, `faculty`, `author`, `publisher`, `date` FROM `books`";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else {
                return false;
            }
        }
        public function anybook_exists(){
            $view_query = "SELECT  `id`,`title`, `description`, `department`, `faculty`, `author`, `publisher`, `date` FROM `books`";
            if($run_view_query = $this->conn->query($view_query)){
                if(mysqli_num_rows($run_view_query) > 0){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
                
                
        }
    }
    class attendance extends db{
        function __construct(){
            $this->conn = $this->connect();
        }
        public function record($fname,$lname,$staff_id,$time_in,$comment,$today_date){
            $record_query  = "INSERT INTO `attendance`(`fname`, `lname`, `staff_id`, `time_in`, `comment`, `today`) VALUES ('$fname','$lname','$staff_id','$time_in','$comment',$today_date)";
            $run_query = $this->conn->query($record_query);
            if($run_query){
                return true;
            }else{
                return false;
            }
        }
        public function view(){
            $view_query = "SELECT `id`, `fname`, `lname`, `staff_id`, `time_in`, `comment`, `date` FROM `attendance`";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else{
                return false;
            }
        }
         public function any_user_exists(){
             //select user from db 
            $select_query  = "SELECT `id`, `staff_id`, `unit`, `password`, `cpassword` FROM `register_user` ";
            //check if user exists 
            $run_select_query = $this->conn->query($select_query);
            if($run_select_query){
                //check if user exists 
                if(mysqli_num_rows($run_select_query) > 0){
                    //check if 
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function user_exists($staff_id){
             //select user from db 
            $select_query  = "SELECT `id`, `staff_id`, `unit`, `password`, `cpassword` FROM `register_user` WHERE `staff_id` = '$staff_id'";
            //check if user exists 
            $run_select_query = $this->conn->query($select_query);
            if($run_select_query){
                //check if user exists 
                if(mysqli_num_rows($run_select_query) > 0){
                    //check if 
                    return true;
//                    trecho "hgello";
                }else{
                    return false;
                }
            }
        }
        //if num rows is greater than zero then return false
        //check if user has signed in that day 

    }
    class permission extends db{
        function __construct(){
            $this->conn = $this->connect();
        }
        public function view(){
            $view_query = "SELECT `id`, `fname`, `lname`, `staff_id`, `resume_date`, `status`, `date` FROM `permission`";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else {
                return false;
            }
        }
        public function send( $fname , $lname , $staff_id , $resume_date , $status ){
            
            $send_query = "INSERT INTO `permission`(`fname`, `lname`, `staff_id`, `resume_date`, `status` )  VALUES('$fname','$lname','$staff_id','$resume_date','$status')";
            
            $run_send_query = $this->conn->query($send_query);
            
            if($run_send_query){
                return true;
            }else{
                return false;
            }
        }
       public function user_exists($staff_id){
             //select user from db 
            $select_query  = "SELECT `id`, `staff_id`, `unit`, `password`, `cpassword` FROM `register_user` WHERE `staff_id` = '$staff_id'";
            //check if user exists 
            $run_select_query = $this->conn->query($select_query);
            if($run_select_query){
                //check if user exists 
                if(mysqli_num_rows($run_select_query) > 0){
                    //check if 
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function reply($staff_id,$status,$accepted_date,$comment){
            
            $reply_query = "INSERT INTO `reply_permissions`(`staff_id`, `status`, `accepted_date`) VALUES ('$staff_id','$status','$accepted_date','$comment')";
            
             $run_reply_query = $this->conn->query($reply_query);
            
            if($run_reply_query){
                return true;
            }else{
                return false;
            }
        }
    }
?>
