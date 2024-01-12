<?php
class Pages extends Controller
{
    private $tags_Wiki;
    private $categoy;
    private $wiki;
    public function __construct()
    {
        $this->tags_Wiki = $this->model('Tags_WikiDao');
        $this->categoy = $this->model('CategorieDao');
        $this->wiki = $this->model('WikiDao');
    }

    public function index()
    {
        $data = [
            'title' => 'wiki',
            'Categorie' => $this->categoy->getAllCat(),
            'post' => $this->tags_Wiki->getAllLIMIT()
        ];

        $this->view('pages/users/Home', $data);
    }

    public function search()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        
            $searchTerm = $data['search'];
            $results = $this->wiki->searchUsers($searchTerm);
            $array = array();
            foreach ($results as $wiki) {
                $data = [
                    'title' => $wiki->getTitle(),
                ];
                $array[] = $data;
            }
    
            
            echo json_encode($array);
        
    }

    public function RechercheCat()
    {
        if (isset($_GET['cat'])) {
            $idCat = $_GET['cat'];
            $CatpOST = new Wiki();
            $CatpOST->getCategorie()->setCategoryID($idCat);

            $this->tags_Wiki->getAllCat($CatpOST);
            $data = [
                'affichewiki' => $this->tags_Wiki->getAllCat($CatpOST)

            ];
            $this->view('pages/users/WikCAT', $data);

        }
    }



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