<?php 
class AdminController extends Controller {
// private $adminDao;
private $categoy;
public function __construct() {
    // $this->adminDao =$this->model('AdminDao');
     $this->categoy=$this->model('CategorieDao');
    
}

public function index() {
$data = [
'title' => 'wiki',
];

$this->view('pages/Dashbord/Dashbord', $data);
}
// -----------------------------------Dashbord
public function Dashbord() {
$data = [
'title' => 'wiki',
];

$this->view('pages/Dashbord/Dashbord', $data);
}
// -----------------------------------Categorie
public function Categorie() {
$data = [
'title' => 'Categorie',
'Categorie'=>$this->categoy->getAllCat()
];

$this->view('pages/Dashbord/Categorie', $data);
}
// -----------------------------------Tags
public function Tags() {
    $data = [
    'title' => 'Tags',
    
    ];
    
    $this->view('pages/Dashbord/Tags', $data);
    }
    // -----------------------------------Wiki
    public function Wiki() {
        $data = [
        'title' => 'Wiki',
        ];
        
        $this->view('pages/Dashbord/Wiki', $data);
        }
    

    // Usage example:


 
}
?>