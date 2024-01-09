<?php

  class UserController extends Controller {
    public function __construct(){
     
  
      }
    //   public function index() {
    //     $data = [
    //         'title' => 'wiki',
    //     ];

    //     $this->view('pages/users/Home', $data);
    // }
    public function register() {
      $data = [
          'title' => 'register',
      ];

      $this->view('pages/register/register', $data);
  }
  public function login() {
    $data = [
        'title' => 'login',
    ];

    $this->view('pages/register/login', $data);
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
  