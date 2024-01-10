<?php
require_once(APPROOT . '/models/Tags_Wiki.php');
 require_once(APPROOT . '/models/Wiki.php');
  require_once(APPROOT . '/models/Tags.php');
 require_once(APPROOT . '/models/Dao/AuthorDao.php');
 require_once(APPROOT . '/models/Categorie.php');

class Tags_WikiDao
{
    private $db;
    private Tags_Wiki $wikis;
    public function __construct()
    {
        $this->db = new Database();
        // $this->wikis=new Tags_Wiki();
    }


    public function getAllAFFiche()
    {
        $req = "SELECT wiki_tags.ID_PIVOT ID, tags.tagName nameTage,wiki.title title,wiki.dateCreated date ,user.nom Author,categorie.categoryName categorie FROM 
        wiki_tags,tags,wiki,user,categorie where wiki_tags.ID_Wiki=wiki.wikiID 
        and tags.tagID=wiki_tags.ID_TAGS 
        and user.id_user=wiki.ID_author and categorie.categoryID=wiki.ID_Categorie and user.role=1 group by wiki.wikiID";
        $this->db->query($req);
        $res = $this->db->fetchAll();
        $static = array();
        foreach ($res as $obj) {
            $statistiques = new Tags_Wiki();
            $statistiques->setID_PIVOT($obj->ID);
            $statistiques->getTags()->setTagName($obj->nameTage);
            $statistiques->getWiki()->setTitle($obj->title);


            $statistiques->getWiki()->setDateCreated($obj->date);
            $statistiques->getWiki()->getAuthor()->setNom($obj->Author);
            $statistiques->getWiki()->getCategorie()->setCategoryName($obj->categorie);
            array_push($static, $statistiques);
        }
       
        return $static;
    }

   
    public function InsertWiki_Tags(Tags_Wiki $tags_Wiki) {
        try {
            $ID_WIKI = $tags_Wiki->getWiki()->getWikiID();
            $ID_Tags = $tags_Wiki->getTags()->getTagID();
            $req = "INSERT INTO `wiki_tags` (`ID_Wiki`, `ID_TAGS`) VALUES (:idwiki, :tags)";
            $this->db->query($req);
            $this->db->bind(':idwiki', $ID_WIKI);  
            $this->db->bind(':tags', $ID_Tags);    
            $this->db->execute();
        } catch (Exception $e) {
            error_log("Error in Insert Wiki_Tags: " . $e->getMessage());
        }
    }
    
    
    public function getWikis()
    {
        return $this->wikis;
    }
}