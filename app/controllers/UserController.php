<?php

class UserController extends Controller
{
  private $Author;
  public function __construct()
  {
    $this->Author = $this->model('AuthorDao');

  }


  public function index()
  {
    $data = [
      'title' => 'register',
    ];

    $this->view('pages/register/register', $data);
  }
  public function register()
  {
    $data = [
      'title' => 'register',
    ];

    $this->view('pages/register/register', $data);
  }
  public function login()
  {
    $data = [
      'title' => 'login',
    ];

    $this->view('pages/register/login', $data);
  }

  //Register
  public function Register_Author()
  {
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
      if (!preg_match($emailPattern, $email)) {
        $error_Email = "Invalid email address.";
      }


      if (empty($image) || $image['error'] !== UPLOAD_ERR_OK) {
        $error_Image = "Please upload a valid image.";
      }


      if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
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
        if ($this->Author->Register($user)) {
          $_SESSION['succes'] = "Inscription Success ";
          redirect('UserController/register');
        } else {
          $_SESSION['Error'] = "on Compte deja creer !! ";
          redirect('UserController/register');
        }


      } else {
        $data = [
          'error_Nom' => $error_Nom,
          'error_Email' => $error_Email,
          'error_Image' => $error_Image,
          'error_Password' => $error_Password,
        ];
        $this->view('pages/register/register', $data);
      }
    }
  }
  public function Login_Author(){
//  $error_Email =  $error_Password = "";
    if(isset($_POST['login'])){
     $email=$_POST['email'];
     $pss=$_POST['password'];
    //  $emailPattern = "/^[a-zA-Z0-9._-]+@[a-z]+\.[a-zA-Z]{2,}$/";
    //  if (!preg_match($emailPattern, $email)) {
    //    $error_Email = "Invalid email address.";
    //  }
     
    //  if (!preg_match("/^[a-zA-Z0-9]+$/", $pss)) {
    //   $error_Password = "Password is not valid.";
    // }
    // if (empty($error_Email) &&  empty($error_Password)) {

     $user=new User();
     $user->setEmail($email);
     $user->setPassword($pss);
     $user=  $this->Author->verifyUser($user);

    if ($user != false) {
    
      $_SESSION['userId'] = $user->id_user;
      $_SESSION['userName'] = $user->nom;
      $_SESSION['userEmail'] = $user->email;
      $_SESSION['userImage'] = $user->IMAGE;
      $_SESSION['userRole'] = $user->role;
 

      if ($_SESSION['userRole'] == 1) {

        redirect('Pages');
    
      } 
      else {
        redirect('AdminController/Dashbord');
       }
  } else {
    $_SESSION['Error']= 'user not found';
    $this->view('pages/register/login');
  }
     }
     //else{
    //   $data = [
    //     'error_Email' => $error_Email,
    //     'error_Password' => $error_Password,
    //   ];
    //    $this->view('pages/register/login',$data);
      
    // }
   else{
    $_SESSION['Error']= 'user not found';
    $this->view('pages/register/login');
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