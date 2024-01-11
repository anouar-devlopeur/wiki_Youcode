<?php
class AuthorController extends Controller
{
    private $categoy;
    private $wiki;
    private $tags;
    private $wiki_tags;
    public function __construct()
    {
        $this->categoy = $this->model('CategorieDao');
        $this->wiki = $this->model('WikiDao');
        $this->tags = $this->model('TagsDao');
        $this->wiki_tags=$this->model('Tags_WikiDao');
    }
    public function index()
    {
        if (!isAuhtor()) {
            redirect('Controller404');
        }
        $data = [
            'title' => 'Auhtor',
            'Categorie' => $this->categoy->getAllCat(),
            'Tags' => $this->tags->getAllTags(),
            'post'=>$this->wiki_tags->getAllAFFiche()

        ];
       

        $this->view('pages/users/author', $data);
    }
    public function updateWiki(){
        $data = [
            'title' => 'UpdateAuhtor',
            'Categorie' => $this->categoy->getAllCat(),
            'Tags' => $this->tags->getAllTags(),
          

        ];

        $this->view('pages/users/updateWiki', $data);
    }
    // -------------------------------------------------
    // insert 
    public function InsertPost()
    {
        if (isset($_POST['addpost'])) {
            // print_r($_POST); 

            $title = $_POST['title'];
            $Content = $_POST['Content'];
            $date = $_POST['date'];
            $category = $_POST['category'];
            $id_User = $_SESSION['userId'];
            $image = $_FILES['img']['name'];
            $tempname = $_FILES['img']['tmp_name'];
            $folder = __DIR__ . "/../../public/img/" . $image;

            move_uploaded_file($tempname, $folder);
            $WIKI = new wiki();
            $WIKI->setTitle($title);
            $WIKI->setContent($Content);
            $WIKI->setImage($image);
            $WIKI->getCategorie()->setCategoryID($category);
            $WIKI->getAuthor()->setId_user($id_User);
            $wiki = $this->wiki->InsertPost($WIKI);
            if (isset($_POST['tags']) && is_array($_POST['tags'])) {
                foreach ($_POST['tags'] as $tag) {
                   $Tags_Wiki=new Tags_Wiki();
             $Tags_Wiki->getWiki()->setWikiID($wiki);
             $Tags_Wiki->getTags()->setTagID($tag);
            //  var_dump($Tags_Wiki->getTags()->setTagID($tag));
           $this->wiki_tags->InsertWiki_Tags($Tags_Wiki);
                }

           

            }
            redirect('pages/users/author');
        }


    }
    // update 
    public function UpdatePost(){
        if(isset($_GET['idupdate'])){
            $id= $_GET['idupdate'];
       
                      $tags_wiki=new Tags_Wiki();
                      $tags_wiki->getWiki()->setWikiID($id);
                  

            $data=[
                'Tags_wiki'=>  $this->wiki_tags->singleAffiche($tags_wiki),
                'Categorie' => $this->categoy->getAllCat(),
                'Tags' => $this->tags->getAllTags()
            ];
           
           
            $this->view('pages/users/updateWiki', $data);
        }
    }
    
    // dellete
    public function DeletePost()
    {
        if (isset($_GET['iddelete'])) {
            $idwiki = $_GET['iddelete'];
            // print_r($idwiki);
             $wikiclass=$this->wiki->getWiki();
     $wikidelet= $wikiclass->setWikiID($idwiki);
         $this->wiki->DeletePost($wikidelet); 
         
        }
    }
    
}