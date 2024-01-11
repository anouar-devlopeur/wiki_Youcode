<?php
require_once(APPROOT . '/models/Wiki.php');
require_once(APPROOT . '/models/Dao/AuthorDao.php');
class WikiDao
{
    // `wikiID`, `title`, `content`, `image`, `dateCreated`, `status`, `ID_author`, `ID_Categorie` 
    private $db;
    private Wiki $wiki;
    //dependency-injection construct/stters
    public function __construct()
    {
        $this->db = new Database();
        $this->wiki = new Wiki();
    }
    // wiki sans Tag
    public function getAllWiki()
    {
       
        $req = "SELECT wikiID, title, content ,wiki.image as image , dateCreated, status, user.nom as nom , categorie.categoryName as Categorie FROM wiki,categorie,user where wiki.ID_Categorie=categorie.categoryID 
        and user.id_user=wiki.ID_author and wiki.status = 1 ";
        $this->db->query($req);
        // obj
        $res = $this->db->fetchAll();
        $Post = array();
       


        foreach ($res as $obj) {
            $WIKI = new Wiki();
            $WIKI->setWikiID($obj->wikiID);
            $WIKI->setTitle($obj->title);
            $WIKI->setContent($obj->content);
            $WIKI->setImage($obj->image);
            $WIKI->setDateCreated($obj->dateCreated);
            $WIKI->setStatus($obj->status);
            $WIKI->getAuthor()->setNom($obj->nom);
            $WIKI->getCategorie()->setCategoryName($obj->Categorie);
            array_push($Post, $WIKI);
        }

        return $Post;

    }
    // ArchiveWiki
    public function ArchiveWiki(Wiki $post)
    {
        try {
            $idwiki = $post->getWikiID();

            $req = "UPDATE `wiki` SET `status`=0 WHERE wikiID=:id";
            $this->db->query($req);
            $this->db->bind(':id', $idwiki);
            $res = $this->db->execute();
        } catch (Exception $e) {
            error_log("Error in Archines wiki: " . $e->getMessage());

        }
    }

    public function InsertPost(Wiki $post){
        try {
            $title = $post->getTitle();
            $content = $post->getContent();
            $image = $post->getImage();
            // date formating
            $currentDate = date('Y-m-d H:i:s');
            $ID_author = $post->getAuthor()->getId_user();
            $ID_Categorie = $post->getCategorie()->getCategoryID();
    
            $req = "INSERT INTO wiki(title,content,image,dateCreated,ID_author, ID_Categorie) 
                    VALUES (:title, :content, :image, :dateCreated, :ID_author, :ID_Categorie)";
    
            $this->db->query($req);
            $this->db->bind(':title', $title);
            $this->db->bind(':content', $content);
            $this->db->bind(':image', $image);
            $this->db->bind(':dateCreated', $currentDate);
            $this->db->bind(':ID_author', $ID_author);
            $this->db->bind(':ID_Categorie', $ID_Categorie);
            
            $this->db->execute();
            $wikiID=$this->db->lastInsertId();
            return $wikiID;
           
        } catch (Exception $e) { 
            error_log("Error in Insert wiki: " . $e->getMessage());
        }
    }
    public function DeletePost(Wiki $post)
    {
        try {
             $idwiki = $post->getWikiID();
            $req = "DELETE FROM `wiki` WHERE wikiID = :id";
            $this->db->query($req);
            $this->db->bind(':id', $idwiki);
            $this->db->execute();
        } catch (Exception $e) {
            error_log("Error in DeleteWiki: " . $e->getMessage());
        }
    }
    
  

    public function getWiki()
    {
        return $this->wiki;
    }
}