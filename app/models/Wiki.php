<?php 
class Wiki{
    // `wikiID`, `title`, `content`, `image`, `dateCreated`, `status`, `ID_author`, `ID_Categorie`
    private $wikiID;
    private $title;
    private $content;
    private $image;
    private $dateCreated;
    private $status;
    private Categorie $categorie;
    private AuthorDao $Author;
    public function __construct(){
        $this->Author=new AuthorDao();
        $this->categorie=new Categorie();
    }
       

    /**
     * Get the value of wikiID
     */ 
    public function getWikiID()
    {
        return $this->wikiID;
    }

    
    public function setWikiID($wikiID)
    {
        $this->wikiID = $wikiID;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

   
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of dateCreated
     */ 
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

  
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

   
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

   

    /**
     * Get the value of Author
     */ 
    public function getAuthor()
    {
        return $this->Author;
    }
}