<?php 
class SingleController extends Controller{
    public function __construct(){
        
    }
    public function index()
    {
        $data = [
            'title' => 'Post',
         
        ];

        $this->view('pages/users/SingleWiki', $data);
    }
    
}