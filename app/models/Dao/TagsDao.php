<?php 
require_once(APPROOT . '/models/Tags.php');
class TagsDao{
    private $db;
    private Tags $tags;
    public function __construct() {
        $this->db=new Database();
        $this->tags=new Tags();
    }
    // get Tags
    public function getAllTags(){
        try {
            $req = "SELECT * FROM `tags`";
            $this->db->query($req);
            $res = $this->db->fetchAll();
            $TAGS = array();
            foreach ($res as $obj) {
                $tags = new Tags();
                $tags->setTagID($obj->tagID);
                $tags->setTagName($obj->tagName);
                array_push($TAGS, $tags);
            }
            return $TAGS;
        } catch (Exception $e) {
            // Handle the exception
            // function is used to send an error message to the web server's error log
            error_log("Error in getAllTags: " . $e->getMessage());

        }
    }
    // insert Tags
    public function InsertTags(Tags $tags)
    {
        try {
            $Tags_name = $tags->getTagName();
            $req = "INSERT INTO tags(tagName) VALUES (:name)";
            $this->db->query($req);
            $this->db->bind(':name', $Tags_name);
            $this->db->execute();
        } catch (Exception $e) {
            // Handle the exception
            error_log("Error in Insert tags: " . $e->getMessage());

        }

    }
     // delete
     public function DelletTags(Tags $tags)
     {
         try {
             $Tags_id = $tags->getTagID();  
             $req = "DELETE FROM `tags` WHERE tagID = :id";
             $this->db->query($req);
             $this->db->bind(":id", $Tags_id);
             $this->db->execute();
         } catch (Exception $e) {
           
             error_log("Error in Dellet Tags: " . $e->getMessage());
         }
     }
    //  Update 
    public function UpdateTags(Tags $tags){
        try {
            $Tags_id = $tags->getTagID(); 
            $tags_name =$tags->getTagName(); 
            $req = "UPDATE `tags` SET tagName=:name WHERE tagID = :id";
            $this->db->query($req);
            $this->db->bind(":id", $Tags_id);
            $this->db->bind(":name", $tags_name); 
            $this->db->execute();
        } catch (Exception $e) {
         
            error_log("Error in Update Tags: " . $e->getMessage());
        }
    }
    
 

    /**
     * Get the value of tags
     */ 
    public function getTags()
    {
        return $this->tags;
    }
}