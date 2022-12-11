<?php





class ArticleDTO
{
    /**
     * @var integer
     */
    public $id = 0;
    
    /**
     * date de création de l'article
     * @var DateTime
     */
    public $creation;
    
    /**
     * autheur de l'article
     * @var UserDTO
     */
    public $author;
    
    /**
     * titre de l'article
     * @var string
     */
    public $title = "";
    
    /**
     * corps de l'article
     * @var string
     */
    public $text = "";
    /**
     * status de publication de l'article
     * definit la visibilité aux visiteurs
     * @var boolean
     */
    public $public = false;
    
    /**
     * status de réservation de l'article
     * à un public définit
     * @var boolean
     */
    public $reserved = true;
    /**
     * retourne une instance d'articleDTO à partir d'un article
     * @param Article $article
     * @return ArticleDTO
     */    
    public static function make(Article $article) {
        $new = new ArticleDTO();
        $new->id = $article->getId();
        $new->author =  UserDTO::makePublic($article->getAuthor());
        $new->creation = $article->getCreation();
        $new->public = $article->isPublic();
        $new->reserved = $article->isReserved();
        $new->title = $article->getTitle();
        $new->text = $article->getText();
        
        return $new;
    }
}

