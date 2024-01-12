<?php
class SingleController extends Controller
{
    private $tags_Wiki;
    public function __construct()
    {
         $this->tags_Wiki=$this->model('Tags_WikiDao');

    }
    public function index()
    {
        $data = [
            'title' => 'Post',
            // 'post'=>$this->tags_Wiki->getAllAFFiche()
        ];

        $this->view('pages/users/SingleWiki', $data);
    }
    public function Single()
    {
        if (isset($_GET['id'])) {
            if (isset($_GET['id'])) {
                $idwiki = $_GET['id'];
                $CatpOST = new Wiki();
                $CatpOST->setWikiID($idwiki);
          
                $data = [
                 'affichersingle'=>$this->tags_Wiki->singleAffiche($CatpOST)
    
                ];     
              
                $this->view('pages/users/SingleWiki', $data);
    
            }

          
        }

    }
    public function singleWiki()
    {
        
    }

}