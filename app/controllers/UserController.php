<?php

  class UserController extends Controller {
    public function __construct(){
     
  
      }
    //   public function LogOut(){
    //     if(isset($_POST['logOut']) && !empty($_SESSION['email'])){
    //         $_SESSION['email']="";
    //         unset($_SESSION['email']);
    //         session_destroy();
    
 
    //         header('location: '.URLROOT.'/pages/login');
            
    //         // For testing, echo a message
    //         // echo "Logged out successfully!";
    //     }
    //     if($_SESSION['email']==""){
            
    //         header('location: '.URLROOT.'/pages/login');
    //     }
    // }

    // $table = 'tag' || 'wiki' || 'cat'
    // URLROOT . '/userController/search/tag.../'
    public function search($table,$search) {
    }
  
  
    }
  