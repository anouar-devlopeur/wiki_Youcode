<?php
class AdminController extends Controller
{
  private $adminDao;
  private $categoy;
  private $tags;
  private $wiki;
  private $tags_Wiki;

  public function __construct()
  {
    $this->adminDao =$this->model('AdminDao');
    $this->categoy = $this->model('CategorieDao');
    $this->tags = $this->model('TagsDao');
    $this->wiki = $this->model('WikiDao');
    $this->tags_Wiki=$this->model('Tags_WikiDao');
  }

  public function index()
  {
    if(!isAdmin()){
      redirect('Controller404');
    }
    
    $data = [
      'title' => 'wiki',
      'Catgorie'=>$this->adminDao->affiche_Statistiques('categorie'),
      'Tags'=>$this->adminDao->affiche_Statistiques('Tags'),
      'Wiki'=>$this->adminDao->affiche_Statistiques('Wiki'),
      'statistique'=>$this->tags_Wiki->getAllAFFiche()
    ];

    $this->view('pages/Dashbord/Dashbord', $data);
  }
  // -----------------------------------Dashbord
  // public function Dashbord()
  // {
  //   $data = [
  //     'title' => 'wiki',
  //     'Catgorie'=>$this->adminDao->affiche_Statistiques('categorie')
      
  //   ];

  //   $this->view('pages/Dashbord/Dashbord', $data);
  // }
  // -----------------------------------Categorie
  public function Categorie()
  {
    $data = [
      'title' => 'Categorie',
      'Categorie' => $this->categoy->getAllCat()
    ];

    $this->view('pages/Dashbord/Categorie', $data);
  }

  // -----------------------------------Tags
  public function Tags()
  {
    $data = [
      'title' => 'Tags',
      'Tags' => $this->tags->getAllTags()

    ];

    $this->view('pages/Dashbord/Tags', $data);
  }
  // -----------------------------------Wiki
  public function Wiki()
  {
    $data = [
      'title' => 'Wiki',
      'Wiki'=>$this->wiki->getAllWiki()
    ];

    $this->view('pages/Dashbord/Wiki', $data);
  }
  // -----------------------------------affiche_Statistiques

  // ------------------------------------Categorie
// Insert Categorie

  public function InsertCategorie()
  {
    if (isset($_POST['addCAT'])) {
      $Categorie_name = $_POST['Categorie'];
      $Categoriy = new Categorie();
      $Categoriy->setCategoryName($Categorie_name);
      $this->categoy->InsertCategorie($Categoriy);
      redirect('AdminController/Categorie');
    }
  }
  //Update Categorie
  public function UpdateCategorie()
  {
    if (isset($_POST['updateCat'])) {
      $id = $_POST['id'];
      $Categorie_name = $_POST['Categorie'];
      $Categorie = new Categorie();
      $Categorie->setCategoryID($id);
      $Categorie->setCategoryName($Categorie_name);
      $this->categoy->UpdateCategorie($Categorie);
      redirect('AdminController/Categorie');
    } else {
      redirect('AdminController/Categorie');

    }
  }
  // Delete Categorie:

  public function DeleteCategorie()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $idCategory = $this->categoy->getCategory()->setCategoryID($id);
      $this->categoy->DeleteCategorie($idCategory);

      redirect('AdminController/Categorie');
    } else {
      redirect('AdminController/Categorie');

    }
  }
  // ----------------------------fin Categorie --------------------
  // -------------------------------Tags----------------
  // insert
  public function InsertTags()
  {
    if(isset($_POST['AddTags'])){
     $tags=$_POST['tags'];
     $Tags=new Tags();
       $this->tags->InsertTags($Tags->setTagName($tags)) ;
       redirect('AdminController/Tags');
    }else{
      redirect('AdminController/Tags');
    }

  }
  // dellete
  public function DeleteTags()
  {
    if(isset($_GET['id'])){
     $tags_id=$_GET['id'];
     $id_Tags=$this->tags->getTags()->setTagID($tags_id);
    //  var_dump($id_Tags);
    //  echo $id_Tags;
        $this->tags->DeleteTags($id_Tags) ;
       redirect('AdminController/Tags');
    }else{

      redirect('AdminController/Tags');
    }

  }
  //update 
  public function UpdateTags(){
    if(isset($_POST['updatetags'])){
      $id=$_POST['id'];
     $Tags_name=$_POST['Tags'];
     $Tags=new Tags();
     $Tags->setTagID($id);
     $Tags->setTagName($Tags_name);
     $this->tags->UpdateTags($Tags);
     redirect('AdminController/Tags');
    }else {
      redirect('AdminController/Tags');
    }
  }
  
  // -----------------------------fin tags--------------------------
  // ------------------------------- wiki --------------
  public function ArchiveWiki(){
    if (isset($_POST['Archive'])) {
      $idWiki = $_POST['id'];
 
      $post = new Wiki();
       $post->setWikiID($idWiki);
      $this->wiki->ArchiveWiki($post); 
      redirect('AdminController/Wiki');
  } else {
      redirect('AdminController/Wiki');
  }
  }
  // ______________________Log Out----------------
  public function logout()
  {
   
    $_SESSION['userId'] = null;
    $_SESSION['userName'] = null;
    $_SESSION['userEmail'] = null;
    $_SESSION['userImage'] =null;
    $_SESSION['userRole'] =null;
    session_destroy();
    // unset();
    redirect('');
  }
  

}
?>