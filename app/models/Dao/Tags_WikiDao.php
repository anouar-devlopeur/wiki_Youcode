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
    }

    // wiki avec Tags
    public function getAllAFFiche()
    {
        $req = "SELECT wiki.*,wiki_tags.ID_PIVOT as IDpv ,user.id_user as user, user.nom AS author, categorie.categoryName AS category, GROUP_CONCAT(tags.tagName) AS tags ,tags.tagID as IDtag 
        FROM wiki LEFT JOIN user ON user.id_user = wiki.ID_author LEFT JOIN categorie ON categorie.categoryID = wiki.ID_Categorie LEFT JOIN wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID LEFT JOIN tags ON tags.tagID = wiki_tags.ID_TAGS 
        WHERE wiki.status = 1 GROUP BY wiki.wikiID ORDER BY wiki.dateCreated DESC";
        $this->db->query($req);
        $res = $this->db->fetchAll();
        $PSOT = array();
        foreach ($res as $obj) {
            $Tags_Wiki = new Tags_Wiki();
            $Tags_Wiki->setID_PIVOT($obj->IDpv);
            $Tags_Wiki->getWiki()->getAuthor()->setId_user($obj->user);
            $Tags_Wiki->getTags()->setTagName($obj->tags);
            $Tags_Wiki->getTags()->setTagID($obj->IDtag);
            $Tags_Wiki->getWiki()->setWikiID($obj->wikiID);
            $Tags_Wiki->getWiki()->setTitle($obj->title);
            $Tags_Wiki->getWiki()->setImage($obj->image);
            $Tags_Wiki->getWiki()->setContent($obj->content);
            $Tags_Wiki->getWiki()->setDateCreated($obj->dateCreated);
            $Tags_Wiki->getWiki()->getAuthor()->setNom($obj->author);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($obj->category);
            array_push($PSOT, $Tags_Wiki);
        }

        return $PSOT;
    }
//afiche home
    public function getAllLIMIT()
    {
        $req = "SELECT wiki.*,wiki_tags.ID_PIVOT as IDpv ,user.id_user as user, user.nom AS author, categorie.categoryName AS category, GROUP_CONCAT(tags.tagName) AS tags ,tags.tagID as IDtag 
        FROM wiki LEFT JOIN user ON user.id_user = wiki.ID_author LEFT JOIN categorie ON categorie.categoryID = wiki.ID_Categorie LEFT JOIN wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID LEFT JOIN tags ON tags.tagID = wiki_tags.ID_TAGS 
        WHERE wiki.status = 1 GROUP BY wiki.wikiID ORDER BY wiki.dateCreated DESC LIMIT 8";
        $this->db->query($req);
        $res = $this->db->fetchAll();
        $PSOT = array();
        foreach ($res as $obj) {
            $Tags_Wiki = new Tags_Wiki();
            $Tags_Wiki->setID_PIVOT($obj->IDpv);
            $Tags_Wiki->getWiki()->getAuthor()->setId_user($obj->user);
            $Tags_Wiki->getTags()->setTagName($obj->tags);
            $Tags_Wiki->getTags()->setTagID($obj->IDtag);
            $Tags_Wiki->getWiki()->setWikiID($obj->wikiID);
            $Tags_Wiki->getWiki()->setTitle($obj->title);
            $Tags_Wiki->getWiki()->setImage($obj->image);
            $Tags_Wiki->getWiki()->setContent($obj->content);
            $Tags_Wiki->getWiki()->setDateCreated($obj->dateCreated);
            $Tags_Wiki->getWiki()->getAuthor()->setNom($obj->author);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($obj->category);
            array_push($PSOT, $Tags_Wiki);
        }

        return $PSOT;
    }

    //afiche donne sauf cat
    public function getAllCat(Wiki $wiki)
    
    {
        // GROUP Contact : GROUP_CONCAT() permet de regrouper les valeurs non nulles d’un groupe en une chaîne de caractère
        $cat=  $wiki->getCategorie()->getCategoryID();
        $req = "SELECT wiki.*,wiki_tags.ID_PIVOT as IDpv ,user.id_user as user, user.nom AS author,user.IMAGE as ImageUser, categorie.categoryName AS category, GROUP_CONCAT(tags.tagName) AS tags ,tags.tagID as IDtag 
        FROM wiki LEFT JOIN user ON user.id_user = wiki.ID_author LEFT JOIN categorie ON categorie.categoryID = wiki.ID_Categorie LEFT JOIN wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID LEFT JOIN tags ON tags.tagID = wiki_tags.ID_TAGS 
        WHERE wiki.status = 1 and wiki.ID_Categorie=:id GROUP BY wiki.wikiID ORDER BY wiki.dateCreated DESC LIMIT 5";
        $this->db->query($req);
        $this->db->bind(':id',$cat);
        $res = $this->db->fetchAll();
        $PSOT = array();
        foreach ($res as $obj) {
            $Tags_Wiki = new Tags_Wiki();
            $Tags_Wiki->setID_PIVOT($obj->IDpv);
            $Tags_Wiki->getWiki()->getAuthor()->setId_user($obj->user);
            $Tags_Wiki->getTags()->setTagName($obj->tags);
            $Tags_Wiki->getTags()->setTagID($obj->IDtag);
            $Tags_Wiki->getWiki()->setWikiID($obj->wikiID);
            $Tags_Wiki->getWiki()->setTitle($obj->title);
            $Tags_Wiki->getWiki()->setImage($obj->image);
            $Tags_Wiki->getWiki()->setContent($obj->content);
            $Tags_Wiki->getWiki()->setDateCreated($obj->dateCreated);
            $Tags_Wiki->getWiki()->getAuthor()->setNom($obj->author);
            $Tags_Wiki->getWiki()->getAuthor()->setIMAGE($obj->ImageUser);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($obj->category);
            array_push($PSOT, $Tags_Wiki);
        }

        return $PSOT;
    }
//affiche singl wiki
    public function singleAffiche(Wiki $wikitags)
    {
        $id_wiki = $wikitags->getWikiID();
        $req = "SELECT wiki.*, wiki_tags.ID_PIVOT as IDpv, user.id_user as user, user.nom AS author,user.IMAGE as ImageUser,
    categorie.categoryID as IDcat ,categorie.categoryName AS category, 
    GROUP_CONCAT(tags.tagName) AS tags ,tags.tagID as IDtag 
            FROM wiki 
            LEFT JOIN user ON user.id_user = wiki.ID_author 
            LEFT JOIN categorie ON categorie.categoryID = wiki.ID_Categorie 
            LEFT JOIN wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID 
            LEFT JOIN tags ON tags.tagID = wiki_tags.ID_TAGS 
            WHERE wiki.status = 1 
            and wiki.wikiID=:id
            GROUP BY wiki.wikiID 
            ORDER BY wiki.dateCreated DESC";

        $this->db->query($req);
        $this->db->bind(':id', $id_wiki);

        $obj = $this->db->single();
        $POSTS = array();

        if ($obj) {
            $Tags_Wiki = new Tags_Wiki();
            $Tags_Wiki->setID_PIVOT($obj->IDpv);
            $Tags_Wiki->getWiki()->getAuthor()->setId_user($obj->user);
            $Tags_Wiki->getWiki()->getAuthor()->setIMAGE($obj->ImageUser);
            $Tags_Wiki->getTags()->setTagName($obj->tags);
            $Tags_Wiki->getTags()->setTagID($obj->IDtag);
            $Tags_Wiki->getWiki()->setWikiID($obj->wikiID);
            $Tags_Wiki->getWiki()->setTitle($obj->title);
            $Tags_Wiki->getWiki()->setImage($obj->image);
            $Tags_Wiki->getWiki()->setContent($obj->content);
            $Tags_Wiki->getWiki()->setDateCreated($obj->dateCreated);
            $Tags_Wiki->getWiki()->getAuthor()->setNom($obj->author);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryID($obj->IDcat);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($obj->category);

            array_push($POSTS, $Tags_Wiki);
        }

        return $POSTS;
    }
    public function singleAfficheV2($id)
    {
        // $id_wiki = $wikitags->getWikiID();
        $req = "SELECT wiki.*, wiki_tags.ID_PIVOT as IDpv, user.id_user as user, user.nom AS author,
    categorie.categoryID as IDcat ,categorie.categoryName AS category, 
    GROUP_CONCAT(tags.tagName) AS tags ,tags.tagID as IDtag 
            FROM wiki 
            LEFT JOIN user ON user.id_user = wiki.ID_author 
            LEFT JOIN categorie ON categorie.categoryID = wiki.ID_Categorie 
            LEFT JOIN wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID 
            LEFT JOIN tags ON tags.tagID = wiki_tags.ID_TAGS 
            WHERE wiki.status = 1 
            and wiki.wikiID=:id
            GROUP BY wiki.wikiID 
            ORDER BY wiki.dateCreated DESC";

        $this->db->query($req);
        $this->db->bind(':id', $id);

        $obj = $this->db->single();
        $POSTS = array();

        if ($obj) {
            $Tags_Wiki = new Tags_Wiki();
            $Tags_Wiki->setID_PIVOT($obj->IDpv);
            $Tags_Wiki->getWiki()->getAuthor()->setId_user($obj->user);
            $tagsArray = explode(',', $obj->tags);
            $Tags_Wiki->getTags()->setTagName($obj->tags);
            $Tags_Wiki->getTags()->setTagID($obj->IDtag);
            $Tags_Wiki->getWiki()->setWikiID($obj->wikiID);
            $Tags_Wiki->getWiki()->setTitle($obj->title);
            $Tags_Wiki->getWiki()->setImage($obj->image);
            $Tags_Wiki->getWiki()->setContent($obj->content);
            $Tags_Wiki->getWiki()->setDateCreated($obj->dateCreated);
            $Tags_Wiki->getWiki()->getAuthor()->setNom($obj->author);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryID($obj->IDcat);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($obj->category);

            array_push($POSTS, $Tags_Wiki);
        }

        return $POSTS;
    }
   
//  search ajax
    public function searchUsers($searchTerm)
    {
        $query = "SELECT 
        wiki.*, 
        wiki_tags.ID_PIVOT as IDpv, 
        user.id_user as user, 
        user.nom AS author,
        categorie.categoryID as IDcat,
        categorie.categoryName AS category,
        GROUP_CONCAT(tags.tagName) AS tags,
        tags.tagID as IDtag 
    FROM 
        wiki 
     JOIN 
        user ON user.id_user = wiki.ID_author 
     JOIN 
        categorie ON categorie.categoryID = wiki.ID_Categorie 
     JOIN 
        wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID 
     JOIN 
        tags ON tags.tagID = wiki_tags.ID_TAGS 
    WHERE 
        wiki.status = 1 
        AND ( wiki.title LIKE :like OR categorie.categoryName LIKE :like OR tags.tagName LIKE :like )
    GROUP BY 
        wiki.wikiID
    ";
    
        $this->db->query($query);
        $this->db->bind(':like', '%' . $searchTerm . '%');
        $results = $this->db->fetchAll();
    
        $rech = array();
        foreach ($results as $row) {
            $Tags_Wiki = new Tags_Wiki();
            $Tags_Wiki->setID_PIVOT($row->IDpv);
            $Tags_Wiki->getWiki()->getAuthor()->setId_user($row->user);
            $Tags_Wiki->getTags()->setTagName($row->tags);
            $Tags_Wiki->getTags()->setTagID($row->IDtag);
            $Tags_Wiki->getWiki()->setWikiID($row->wikiID);
            $Tags_Wiki->getWiki()->setTitle($row->title);
            $Tags_Wiki->getWiki()->setImage($row->image);
            $Tags_Wiki->getWiki()->setContent($row->content);
            $Tags_Wiki->getWiki()->setDateCreated($row->dateCreated);
            $Tags_Wiki->getWiki()->getAuthor()->setNom($row->author);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryID($row->IDcat);
            $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($row->category);
            array_push($rech, $Tags_Wiki);
        }
    
        return $rech;
    }
    //Tags
    // public function searchTags($searchTerm)
    // {
    //     $query = "SELECT 
    //         wiki.*, 
    //         wiki_tags.ID_PIVOT as IDpv, 
    //         user.id_user as user, 
    //         user.nom AS author,
    //         categorie.categoryID as IDcat,
    //         categorie.categoryName AS category,
    //         GROUP_CONCAT(tags.tagName) AS tags,
    //         tags.tagID as IDtag 
    //     FROM 
    //         wiki 
    //     LEFT JOIN 
    //         user ON user.id_user = wiki.ID_author 
    //     LEFT JOIN 
    //         categorie ON categorie.categoryID = wiki.ID_Categorie 
    //     LEFT JOIN 
    //         wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID 
    //     LEFT JOIN 
    //         tags ON tags.tagID = wiki_tags.ID_TAGS 
    //     WHERE 
    //         wiki.status = 1 
    //         AND tags.tagName LIKE :searchTerm
    //     GROUP BY 
    //         wiki.wikiID";
    
    //     $this->db->query($query);
    //     $this->db->bind(':searchTerm', '%' . $searchTerm . '%');
    //     $results = $this->db->fetchAll();
    
    //     $rech = array();
    //     foreach ($results as $row) {
    //         $Tags_Wiki = new Tags_Wiki();
    //         $Tags_Wiki->setID_PIVOT($row->IDpv);
    //         $Tags_Wiki->getWiki()->getAuthor()->setId_user($row->user);
    //         $Tags_Wiki->getTags()->setTagName($row->tags);
    //         $Tags_Wiki->getTags()->setTagID($row->IDtag);
    //         $Tags_Wiki->getWiki()->setWikiID($row->wikiID);
    //         $Tags_Wiki->getWiki()->setTitle($row->title);
    //         $Tags_Wiki->getWiki()->setImage($row->image);
    //         $Tags_Wiki->getWiki()->setContent($row->content);
    //         $Tags_Wiki->getWiki()->setDateCreated($row->dateCreated);
    //         $Tags_Wiki->getWiki()->getAuthor()->setNom($row->author);
    //         $Tags_Wiki->getWiki()->getCategorie()->setCategoryID($row->IDcat);
    //         $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($row->category);
    //         array_push($rech, $Tags_Wiki);
    //     }
    
    //     return $rech;
    // }
    // categorie
    // public function searchCat($searchTerm)
    // {
    //     $query = "SELECT 
    //         wiki.*, 
    //         wiki_tags.ID_PIVOT as IDpv, 
    //         user.id_user as user, 
    //         user.nom AS author,
    //         categorie.categoryID as IDcat,
    //         categorie.categoryName AS category,
    //         GROUP_CONCAT(tags.tagName) AS tags,
    //         tags.tagID as IDtag 
    //     FROM 
    //         wiki 
    //     LEFT JOIN 
    //         user ON user.id_user = wiki.ID_author 
    //     LEFT JOIN 
    //         categorie ON categorie.categoryID = wiki.ID_Categorie 
    //     LEFT JOIN 
    //         wiki_tags ON wiki_tags.ID_Wiki = wiki.wikiID 
    //     LEFT JOIN 
    //         tags ON tags.tagID = wiki_tags.ID_TAGS 
    //     WHERE 
    //         wiki.status = 1 
    //         AND categorie.categoryName LIKE :searchTerm
    //     GROUP BY 
    //         wiki.wikiID";
    
    //     $this->db->query($query);
    //     $this->db->bind(':searchTerm', '%' . $searchTerm . '%');
    //     $results = $this->db->fetchAll();
    
    //     $rech = array();
    //     foreach ($results as $row) {
    //         $Tags_Wiki = new Tags_Wiki();
    //         $Tags_Wiki->setID_PIVOT($row->IDpv);
    //         $Tags_Wiki->getWiki()->getAuthor()->setId_user($row->user);
    //         $Tags_Wiki->getTags()->setTagName($row->tags);
    //         $Tags_Wiki->getTags()->setTagID($row->IDtag);
    //         $Tags_Wiki->getWiki()->setWikiID($row->wikiID);
    //         $Tags_Wiki->getWiki()->setTitle($row->title);
    //         $Tags_Wiki->getWiki()->setImage($row->image);
    //         $Tags_Wiki->getWiki()->setContent($row->content);
    //         $Tags_Wiki->getWiki()->setDateCreated($row->dateCreated);
    //         $Tags_Wiki->getWiki()->getAuthor()->setNom($row->author);
    //         $Tags_Wiki->getWiki()->getCategorie()->setCategoryID($row->IDcat);
    //         $Tags_Wiki->getWiki()->getCategorie()->setCategoryName($row->category);
    //         array_push($rech, $Tags_Wiki);
    //     }
    
    //     return $rech;
    // }



  

    //     $req = "SELECT wikiID, title, content ,wiki.image as image , dateCreated, status, user.nom as nom , categorie.categoryName as Categorie FROM wiki,categorie,user,tags where wiki.ID_Categorie=categorie.categoryID 
    //  and  wiki_tags.ID_Wiki=wiki.wikiID 
    //     and tags.tagID=wiki_tags.ID_TAGS and user.id_user=wiki.ID_author and wiki.status = 1 ";
    //     $this->db->query($req);
    //     // obj
    //     $res = $this->db->fetchAll();
    //     $Post = array();



    //     foreach ($res as $obj) {
    //         $WIKI = new Wiki();
    //         $WIKI->setWikiID($obj->wikiID);
    //         $WIKI->setTitle($obj->title);
    //         $WIKI->setContent($obj->content);
    //         $WIKI->setImage($obj->image);
    //         $WIKI->setDateCreated($obj->dateCreated);
    //         $WIKI->setStatus($obj->status);
    //         $WIKI->getAuthor()->setNom($obj->nom);
    //         $WIKI->getCategorie()->setCategoryName($obj->Categorie);
    //         array_push($Post, $WIKI);
    //     }

    //     return $Post;

    // }
// insert wiki 
    public function InsertWiki_Tags(Tags_Wiki $tags_Wiki)
    {
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
// update wiki tags
    public function UpdateWikiTags(Tags_Wiki $tags_Wiki)
    {
        $tags = $tags_Wiki->getTags()->getTagID();
        $id = $tags_Wiki->getWiki()->getWikiID();
        $req = "UPDATE `wiki_tags` SET `ID_TAGS`= :tags WHERE ID_Wiki= :id ";
        $this->db->query($req);
        $this->db->bind(':id', $id);
        $this->db->bind(':tags', $tags);
        $this->db->execute();
    }
// clear wiki
    public function clearTagsForWiki($wikiID)
    {
        $req = "DELETE FROM `wiki_tags` WHERE `ID_Wiki` = :wikiID";
        $this->db->query($req);
        $this->db->bind(':wikiID', $wikiID);
        $this->db->execute();
    }










    // ------------
    public function getWikis()
    {
        return $this->wikis;
    }
}