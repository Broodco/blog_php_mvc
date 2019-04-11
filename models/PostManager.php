<?php
namespace Broodco\Blog\Models;
require_once './models/Manager.php';
class PostManager extends Manager
{
    public function getBlogEntries ()
    {
        $blog_DB = $this->DBConnect();
        // Récupération de la table des billets 
        $entriesTable = $blog_DB->query("
            SELECT 
                *,
                DATE_FORMAT(date_creation, '%Hh%i %d/%m') AS date_post
                FROM blog_entries
                ORDER BY id DESC
        ");
        return $entriesTable;
    }
    public function getEntry ($entryID) 
    {
        $blog_DB = $this->DBConnect();
        $entryLine = $blog_DB->prepare("
            SELECT 
                *, 
                DATE_FORMAT(date_creation, '%Hh%i %d/%m') AS date_post
                FROM blog_entries
                WHERE id = ?
        ");
        $entryLine->execute(array($entryID));
        $fetched_entryLine = $entryLine->fetch();
        return $fetched_entryLine;
    }
}
?>