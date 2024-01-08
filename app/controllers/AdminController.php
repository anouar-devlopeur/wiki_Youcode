<?php
class AdminController extends Controller
{
  // private $adminDao;
  private $categoy;
  public function __construct()
  {
    // $this->adminDao =$this->model('AdminDao');
    $this->categoy = $this->model('CategorieDao');

  }

  public function index()
  {
    $data = [
      'title' => 'wiki',
    ];

    $this->view('pages/Dashbord/Dashbord', $data);
  }
  // -----------------------------------Dashbord
  public function Dashbord()
  {
    $data = [
      'title' => 'wiki',
    ];

    $this->view('pages/Dashbord/Dashbord', $data);
  }
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

    ];

    $this->view('pages/Dashbord/Tags', $data);
  }
  // -----------------------------------Wiki
  public function Wiki()
  {
    $data = [
      'title' => 'Wiki',
    ];

    $this->view('pages/Dashbord/Wiki', $data);
  }

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

  public function DelletCategorie()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $idCategory = $this->categoy->getCategory()->setCategoryID($id);
      $this->categoy->DelletCategorie($idCategory);

      redirect('AdminController/Categorie');
    } else {
      redirect('AdminController/Categorie');

    }
  }
  // ______________________Log Out----------------
  public function logout()
  {
    $_SESSION['id_user'] = null;
    $_SESSION['nom'] = null;
    $_SESSION['email'] = null;
    session_destroy();
    redirect('');
  }

}
?>