<?php
namespace Broodco\Blog\Models;
require_once './models/Manager.php';
class CommentManager extends Manager
{
    public function getTotalComments ($entry)
    {                
        $blog_DB = $this->DBConnect();
        $totalComments = $blog_DB->prepare("
            SELECT
                COUNT(*) AS total FROM blog_comments WHERE id_entry = :id_post
        ");
        $totalComments->execute(
            array(
                'id_post' => (int)$entry['id']
            )
            );
        return $totalComments;
    }
    public function getComments ($entryID)
    {
        $blog_DB = $this->DBConnect();
        $commentsTable = $blog_DB->prepare("
        SELECT 
            *,
            DATE_FORMAT(date_comment, '%Hh%i %d/%m') AS date_comment
            FROM blog_comments
            WHERE id_entry = ?
            ORDER BY id DESC
        ");
        $commentsTable->execute(array($entryID));
        return $commentsTable;
    }
    public function getOneComment ($commentID)
    {
        $blog_DB = $this->DBConnect();
        $commentRow = $blog_DB->prepare("
        SELECT
            *,
            DATE_FORMAT(date_comment, '%Hh%i %d/%m') AS date_comment
            FROM blog_comments
            WHERE id = ?
        ");
        $commentRow->execute(array($commentID));
        $commentToEdit = $commentRow->fetch(\PDO::FETCH_ASSOC);
        return $commentToEdit;
    }
    public function postComment ($entryID, $author, $content)
    {
        $blog_DB = $this->DBConnect();
        $req = $blog_DB->prepare('
        INSERT
            INTO blog_comments
                (id_entry,author,comment,date_comment)
            VALUES
                (:entryID, :author, :content, NOW())
        ');
        $affectedLines = $req->execute(
            array(
                'entryID' => htmlspecialchars($entryID),
                'author' => htmlspecialchars($author),
                'content' => htmlspecialchars($content)
            )
        );
        return $affectedLines;
    }
    public function updateComment ($commentID, $author, $comment)
    {
        $blog_DB = $this->DBConnect();
        $req = $blog_DB->prepare('
        UPDATE blog_comments
            SET
                author = :author,
                comment = :comment,
                date_comment = NOW()
            WHERE 
                id = :id
        ');
        $affectedRow = $req->execute(
            array(
                'author' => htmlspecialchars($author),
                'comment' => htmlspecialchars($comment),
                'id' => $commentID
            )
        );
        return $affectedRow;
    }
}
?>