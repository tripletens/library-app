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

            $query = "SELECT * FROM `register_user` where `staff_id` = '$staff_id' && `password` = '$passwordhash'";
            
            $run_query = $this->conn->query($query);
            if($run_query){
                return $run_query;
            
            }else{
                return false;
            }
        }
        public function rank_login($staff_id){
            $query = "SELECT `position` from `register_user` where `staff_id` = '$staff_id'";
            $run_query = $this->conn->query($query);
            $row = mysqli_fetch_assoc($run_query);
            
            return $row['position'];
 
        }
        public function logout(){
            return session_destroy();
        }
        // `id`, `staff_id`, `first_name`, `last_name`, `phone`, `email`, `level`, `step`, `unit`, `position`, `rank`, `campus`, `password`, `cpassword`, `date` FROM `register_user`
        public function create_user($staff_id ,$fname, $lname, $phone , $email ,$level,$step,$unit,$position,$rank,$campus, $password , $cpassword){
            //insert query 
            $passwordhash = md5($password);
            $cpasswordhash = md5($cpassword);
            
            $staff_id = strtolower($staff_id);
            $fname = strtolower($fname);
            $lname = strtolower($lname);
            $phone = intval($phone);
            $email = strtolower($email);
            $level = intval($level);
            $step = intval($step);
            $unit = strtolower($unit);
            $position =strtolower($position);
            $rank = strtolower($rank);
            $password = strtolower($password);
            $cpassword = strtolower($cpassword);

            $insert_query = "INSERT INTO `register_user`(`staff_id`, `first_name`, `last_name`,`phone`,`email`,`level`,`step`, `unit`, `position`,`rank`, `password`, `cpassword`) VALUES ('$staff_id','$fname','$lname','$phone','$email','$level','$step','$unit','$position','$rank','$passwordhash','$cpasswordhash')";
            
             $run_insert_query = $this->conn->query($insert_query);
                if($run_insert_query){
                    return true;
                }else{
                   return false;
                    
                }
        }
        public function edit_user($staff_id ,$fname, $lname, $unit , $position, $password , $cpassword){
            //update query
            $passwordhash = md5($password);
            $cpasswordhash = md5($cpassword);

            $staff_id = strtolower($staff_id);
            $fname = strtolower($fname);
            $lname = strtolower($lname);
            $unit = strtolower($unit);
            $position =strtolower($position);
            $password = strtolower($password);
            $cpassword = strtolower($cpassword);

            $update_query = "UPDATE `register_user` SET `first_name`= '$fname' , `last_name`='$lname' ,
                             `unit`='$unit', `position` = '$position' , `password` = '$passwordhash' , `cpassword` = '$cpasswordhash' where `staff_id` = '$staff_id'";
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
            $select_query  = "SELECT * FROM `register_user` WHERE `staff_id` = '$staff_id'";
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
            $select_query  = "SELECT * FROM `register_user` WHERE `staff_id` = '$staff_id'";
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
        public function record($staff_id,$time_in,$comment){
            $record_query  = "INSERT INTO `attendance`(`staff_id`, `time_in`, `comment`)  VALUES ('$staff_id','$time_in','$comment')";
            $run_query = $this->conn->query($record_query);
            if($run_query){
                return true;
            }else{
                return false;
            }
        }
        public function view(){
            $view_query = "SELECT * FROM `attendance`";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else{
                return false;
            }
        }
        public function view_user($staff_id){
            $view_query = "SELECT * FROM `attendance` where `staff_id` = '$staff_id' ";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else{
                return false;
            }
        }
        public function view_user_by_rank_staff($rank){
            $view_query = "SELECT * FROM `attendance` where `rank` = '$rank'";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else{
                return false;
            }
        }
        public function send($staff_id,$d_o_p,$subject,$comment,$resume_date,$status){
            
            $send_query = "INSERT INTO `memos`( `staff_id`, `d_o_p`, `subject`, `comment`, `resume_date`, `status`) VALUES ('$staff_id','$d_o_p','$subject','$comment','$resume_date','$status')";
           
            $run_send_query = $this->conn->query($send_query);
            
            if($run_send_query){
                return true;
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
    /**
    *  
    */
    class memos extends db
    {
        
        function __construct()
        {
            # code...
            $this->conn = $this->connect();
        }

        public function view(){
            $view_query = "SELECT * FROM `memos`";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else{
                return false;
            }
        }
        public function send($staff_id,$d_o_p,$subject,$comment,$resume_date,$status){
            
            $send_query = "INSERT INTO `memos`( `staff_id`, `d_o_p`, `subject`, `comment`, `resume_date`, `status`) VALUES ('$staff_id','$d_o_p','$subject','$comment','$resume_date','$status')";
           
            $run_send_query = $this->conn->query($send_query);
            
            if($run_send_query){
                return true;
            }else{
                return false;
            }
        }
    }
    class reports extends db
    {
        
        function __construct()
        {
        
            $this->conn = $this->connect();
        }

        public function view(){
            $view_query = "SELECT * FROM `reports`";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else{
                return false;
            }
        }
        // SELECT `id`, `subject`, `date`, `doc_name`, `reciever` FROM `reports`
        public function send($subject,$date,$doc_name,$reciever){
            
            $send_query = "INSERT INTO `reports`( `subject`, `date`, `doc_name`, `reciever`) VALUES ('$subject','$date','$doc_name','$reciever')";
           
            $run_send_query = $this->conn->query($send_query);
            
            if($run_send_query){
                return true;
            }else{
                return false;
            }
        }
        public function upload(){

    
            
            
        }
    }
    class permission extends db{
        function __construct(){
            $this->conn = $this->connect();
        }
        public function view(){
            $view_query = "SELECT *  FROM `permission`";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else {
                return false;
            }
        }
        public function view_staff_id($staff_id){
            $view_query = "SELECT *  FROM `permission` where `staff_id` = '$staff_id'";
            $run_view_query = $this->conn->query($view_query);
            if($run_view_query){
                return $run_view_query;
            }else {
                return false;
            }
        }
        public function send($staff_id,$d_o_p,$subject,$comment,$resume_date,$status){
            
            $send_query = "INSERT INTO `permission`( `staff_id`, `d_o_p`, `subject`, `comment`, `resume_date`, `status`) VALUES ('$staff_id','$d_o_p','$subject','$comment','$resume_date','$status')";
           
            $run_send_query = $this->conn->query($send_query);
            
            if($run_send_query){
                return $run_send_query;
            }else{
                return false;
            }
        }
        public function update_reply_table($staff_name,$staff_id,$unit,$campus,$d_o_p,$resume_date,$subject,$comment,$status){

            $query = "INSERT INTO `reply_permissions`(`staff_name`, `staff_id`, `unit`, `campus`, `d_o_p`, `resume_date`, `subject`, `comment`,`status`) VALUES ('$staff_name','$staff_id','$unit','$campus','$d_o_p','$resume_date','$subject','$comment','$status')";
            $run_send_query = $this->conn->query($query);
            
            if($run_send_query){
                return $run_send_query;
            }else{
                return false;
            }
        }
        //things i need from register_user table
        // staff name 
        // unit
        // campus

        //things  need from permission 
        //resume date 
        //subject SELECT column_name(s) FROM table1
        // UNION ALL
        // SELECT column_name(s) FROM table2;
        // SELECT `first_name`, `last_name`,`unit`,`campus` FROM `register_user` UNION  SELECT `d_o_p`, `subject`, `comment`, `resume_date` FROM `permission`
        //         SELECT Customers.CustomerName, Orders.OrderID
        // FROM Customers
        // FULL OUTER JOIN Orders ON Customers.CustomerID=Orders.CustomerID
        // ORDER BY Customers.CustomerName;
        // SELECT column_name(s)
        // FROM table1
        // LEFT JOIN table2 ON table1.column_name = table2.column_name;
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
        public function update_status($staff_id,$status){
            $query = " UPDATE `reply_permissions` SET `status`= '$status' WHERE `staff_id` = '$staff_id'";
            $run_query = $this->conn->query($query);
            
            if($run_query){
                return $run_query;
                
            }else{
                return false;
            }
        }
        public function joinedtwo(){
            $query = "SELECT `first_name`, `last_name`,`unit`,`campus` FROM  register_user
                   ";
            $second_query =  "SELECT *  FROM `permission`";
            $run_query = $this->conn->query($query);
            $run_second_query = $this->conn->query($second_query);
            if($run_query && $run_second_query){
                
                return $run_second_query;
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
