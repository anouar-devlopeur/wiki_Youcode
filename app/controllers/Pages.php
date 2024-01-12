<?php
class Pages extends Controller
{   private $tags_Wiki;
    private $categoy;
    private $wiki;
    public function __construct()
    {
         $this->tags_Wiki=$this->model('Tags_WikiDao');
        $this->categoy = $this->model('CategorieDao');
        $this->wiki = $this->model('WikiDao');
    }

    public function index()
    {
        $data = [
            'title' => 'wiki',
            'Categorie' => $this->categoy->getAllCat(),
            'post'=>$this->tags_Wiki->getAllAFFiche()
        ];

        $this->view('pages/users/Home', $data);
    }
 
    public function search()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $results = $this->wiki->searchUsers($searchTerm);
    
            echo json_encode($results);
        }
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