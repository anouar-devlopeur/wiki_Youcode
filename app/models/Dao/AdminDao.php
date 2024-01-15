<?php 
require_once(APPROOT . '/models/User.php');

class AdminDao extends User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    // afiche statistique
    function affiche_Statistiques($tableName) {
        try {
            $req = "SELECT COUNT(*) AS count FROM $tableName";
            $this->db->query($req);
            $result = $this->db->single();
    
            return $result->count;
        } catch (Exception $e) {
            // Handle the exception or log the error
            error_log("Error in Admin affiche_Statistiques: " . $e->getMessage());
            return false;
        }
    }
  
    

    
}