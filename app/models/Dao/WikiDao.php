<?php
require_once(APPROOT . '/models/Wiki.php'); 
require_once(APPROOT . '/models/Dao/AuthorDao.php');
class WikiDao{
    // `wikiID`, `title`, `content`, `image`, `dateCreated`, `status`, `ID_author`, `ID_Categorie` 
    private $db;
    private Wiki $wiki;
    public function __construct(){
        $this->db = new Database();
        $this->wiki = new Wiki();
    }
    public function getAllWiki(){
        $req="SELECT `wikiID`, `title`, `content`, `image`, `dateCreated`, `status`, user.nom nom, categorie.categoryName Categorie FROM wiki,categorie,user where wiki.ID_Categorie=categorie.categoryID 
        and user.id_user=wiki.ID_author and wiki.status=1";
        $this->db->query($req);
        // obj
       $res= $this->db->fetchAll();
       $Wiki=array();
       foreach($res as $obj){
        $WIKI=new Wiki();
        $WIKI->setWikiID($obj->wikiID);
        $WIKI->setTitle($obj->title);
        $WIKI->setContent($obj->content);
        $WIKI->setImage($obj->image);
        $WIKI->setDateCreated($obj->dateCreated);
        $WIKI->setStatus($obj->status);
        $WIKI->getAuthor()->setNom($obj->nom);
        $WIKI->getCategorie()->setCategoryName($obj->Categorie);
       array_push($Wiki,$WIKI);
       }
       return $Wiki;
           
    }
    // ArchiveWiki
    public function ArchiveWiki(Wiki $wiki){
        try {
       $idwiki= $wiki->getWikiID();
      
        $req="UPDATE `wiki` SET `status`=0 WHERE wikiID=:id";
        $this->db->query($req);
        $this->db->bind(':id',$idwiki);
       $res= $this->db->execute();
    //    var_dump($res);
        }
        catch(Exception $e){
            error_log("Error in Archines wiki: " . $e->getMessage());
 
        }
    }
    
}