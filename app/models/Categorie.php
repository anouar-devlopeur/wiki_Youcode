<?php 
class Categorie{
    // `categoryID`, `categoryName:
    private $categoryID;
    private $categoryName;
    public function __construct(){
        
    }

    /**
     * Get the value of categoryID
     */ 
    public function getCategoryID()
    {
        return $this->categoryID;
    }

  
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;

        return $this;
    }

    /**
     * Get the value of categoryName
     */ 
    public function getCategoryName()
    {
        return $this->categoryName;
    }

  
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }
}