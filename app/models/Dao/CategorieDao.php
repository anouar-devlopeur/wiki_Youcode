<?php
require_once(APPROOT . '/models/Categorie.php');
class CategorieDao
{
    private $db;
    private Categorie $category;
    public function __construct()
    {
        $this->db = new Database();
        $this->category = new Categorie();

    }
    // data Categorie
    public function getAllCat()
    {
        try {
            $req = "SELECT * FROM `categorie`";
            $this->db->query($req);
            $res = $this->db->fetchAll();
            $categorie = array();
            foreach ($res as $obj) {
                $category = new Categorie();
                $category->setCategoryID($obj->categoryID);
                $category->setCategoryName($obj->categoryName);
                array_push($categorie, $category);
            }
            return $categorie;
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in getAllCat: " . $e->getMessage());

        }
    }

    //insert
    public function InsertCategorie(Categorie $categorie)
    {
        try {
            $categorie_name = $categorie->getCategoryName();
            $req = "INSERT INTO categorie(categoryName) VALUES (:name)";
            $this->db->query($req);
            $this->db->bind(':name', $categorie_name);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in Insert cat: " . $e->getMessage());

        }

    }
    // Update 
    public function UpdateCategorie(Categorie $categorie)
    {
        try {
            $categorie_id=$categorie->getCategoryID();
            $categorie_name=$categorie->getCategoryName();
            $req = "UPDATE categorie SET categoryName=:name WHERE categoryID= :id";
            $this->db->query($req);
            $this->db->bind(":id", $categorie_id);
            $this->db->bind(":name", $categorie_name);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in update cat: " . $e->getMessage());

        }
    }
    //delete
    public function DeletCategorie(Categorie $categorie)
    {
        try {
            $categorie_id=$categorie->getCategoryID();
            $req = "DELETE FROM `categorie` WHERE categoryID= :id";
            $this->db->query($req);
            $this->db->bind(":id", $categorie_id);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            // Log the error for debugging purposes
            error_log("Error in Dellet cat: " . $e->getMessage());

        }
    }

   
    public function getCategory()
    {
        return $this->category;
    }

  
}