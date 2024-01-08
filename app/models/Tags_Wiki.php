<?php 

class Tags_Wiki{
    // `ID_Wiki`, `ID_TAGS`, `ID_PIVOT
    private $ID_PIVOT;
    private Wiki $wiki;
    private Tags $tags;
    public function __construct(){
        $this->wiki=new Wiki();
        $this->tags=new Tags();
    }

 
    public function getID_PIVOT()
    {
        return $this->ID_PIVOT;
    }

   
    public function setID_PIVOT($ID_PIVOT)
    {
        $this->ID_PIVOT = $ID_PIVOT;

        return $this;
    }

    
    public function getWiki()
    {
        return $this->wiki;
    }

   
    public function getTags()
    {
        return $this->tags;
    }
}