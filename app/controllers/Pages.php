<?php


class Pages extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => 'wiki',
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