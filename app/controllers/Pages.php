<?php
class Pages extends Controller
{   private $tags_Wiki;
    private $categoy;
    public function __construct()
    {
        //  $this->tags_Wiki=$this->model('Tags_WikiDao');
        $this->categoy = $this->model('CategorieDao');
    }

    public function index()
    {
        $data = [
            'title' => 'wiki',
            'Categorie' => $this->categoy->getAllCat(),
            // 'post'=>$this->tags_Wiki->getAllAFFiche()
        ];

        $this->view('pages/users/Home', $data);
    }
 
    // public function FunctionName() {
    //     redirect('Pages/index');
    // }

    //     public function login() {
//         $data = [
//             'title' => 'login',
//         ];
//         $this->view('pages/login');
//     }

    //     public function signUp() {
//         $data = [
//             'title' => 'signUp',
//         ];
//         $this->view('pages/signUp');
//     }

    //     public function client() {

    //      if(!empty($_SESSION['email'])){
//       $email = $_SESSION['email'];
//       $data = [
//         'title' => 'client',
//         'email' => $email,
//         'client'=> $this->client->getAll()
//     ];


    //     $this->view('pages/client', $data);
//      }


    //     else{
//       header('Location: ' . URLROOT . '/pages/login');
//     }
//    }
}
?>