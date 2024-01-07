<?php 
require_once(APPROOT . '/models/Categorie.php');
class CategorieDao{
    private $db;
    private Categorie $category;
    public function __construct(){
        $this->db=new Database();
        $this->category=new Categorie();
        
    }
    // data Categorie
    public function getAllCat(){
        $req="SELECT * FROM `categorie`";
        $this->db->query($req);
      $res=  $this->db->fetchAll();
      $categorie=array();
      foreach($res as $obj){
        $category= new Categorie();
        $category->setCategoryID($obj->categoryID);
        $category->setCategoryName($obj->categoryName);
        array_push($categorie,$category);
      }
      return $categorie;
        
    }
    public function DelletCategorie($id) {
        $req = "DELETE FROM `categorie` WHERE categoryID= :id";
        $this->db->query($req);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}