<?php 
class AuthorController extends Controller{
    private $categoy;
    public function __construct(){
        $this->categoy = $this->model('CategorieDao');
    }
    public function index()
    {
        if(!isAuhtor()){
            redirect('Controller404');
          }
        $data = [
            'title' => 'Auhtor',
            'Categorie' => $this->categoy->getAllCat()
        ];

        $this->view('pages/users/author', $data);
    }
    
  
}