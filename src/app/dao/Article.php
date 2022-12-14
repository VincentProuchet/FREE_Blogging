<?php
/**
 * représente les données d'un article de blog
 * @author Vincent
 *
 */
class Article
{

    /**
     * @var integer
     */
    private $id = 0;

    /**
     * date de création de l'article
     * @var DateTime
     */
    private $creation;

    /**
     * autheur de l'article
     * @var User
     */
    private $author;

    /**
     * titre de l'article
     * @var string
     */
    private $title = "";

    /**
     * corps de l'article
     * @var string
     */
    private $text = "";
    /**
     * status de publication de l'article
     * definit la visibilité aux visiteurs
     * @var boolean
     */
    private $public = false;
    
    /**
     * status de réservation de l'article 
     * à un public définit
     * @var boolean
     */
    private $reserved = true;
    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreation()
    {
        return $this->creation;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return boolean
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * @return boolean
     */
    public function isReserved()
    {
        return $this->reserved;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param DateTime $creation
     */
    public function setCreation($creation)
    {
        $this->creation = $creation;
    }

    /**
     * @param User $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param boolean $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }

    /**
     * @param boolean $reserved
     */
    public function setReserved($reserved)
    {
        $this->reserved = $reserved;
    }

}


