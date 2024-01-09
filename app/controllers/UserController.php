<?php

  class UserController extends Controller {
    private $Author;
    public function __construct(){
     $this->Author=$this->model('AuthorDao');
  
      }
      // UserController/register
      
      public function index() {
        $data = [
            'title' => 'register',
        ];
  
        $this->view('pages/register/register', $data);
    }
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

//Register
public function Register_Author() {
  $error_Nom = $error_Email = $error_Image = $error_Password = "";

  if (isset($_POST['AddRegister'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $image = $_FILES['author'];

    
      if (empty($name) || !preg_match("/^[a-zA-Z]+$/", $name)) {
          $error_Nom = "Invalid name. Name should contain only letters.";
      }

      
      $emailPattern = "/^[a-zA-Z0-9._-]+@[a-z]+\.[a-zA-Z]{2,}$/";
      if ( !preg_match($emailPattern, $email)) {
          $error_Email = "Invalid email address.";
      }

      
      if (empty($image) || $image['error'] !== UPLOAD_ERR_OK) {
          $error_Image = "Please upload a valid image.";
      }

    
      if ( !preg_match("/^[a-zA-Z0-9]+$/", $password)) {
          $error_Password = "Password is not valid.";
      }

 
      if (empty($error_Nom) && empty($error_Email) && empty($error_Image) && empty($error_Password)) {
          $tmp_name = $image['tmp_name'];
          $imageContent = file_get_contents($tmp_name);

       
          $user = new User();
          $user->setNom($name);
          $user->setEmail($email);
          $user->setPassword($password);
          $user->setIMAGE($imageContent);

          $this->Author->Register($user);
          $_SESSION['succes']="Inscription Success ";
          redirect('UserController/register');
      } else {
         $data=[
          'error_Nom' => $error_Nom,
          'error_Email' => $error_Email,
          'error_Image' => $error_Image,
          'error_Password' => $error_Password,
         ];
          $this->view('pages/register/register',$data);
      }
  }
}


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
    // public function search($table,$search) {
    // }
  
  
    // }
  