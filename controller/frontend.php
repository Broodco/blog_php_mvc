<?php
    use Broodco\Blog\Models\PostManager;
    use Broodco\Blog\Models\CommentManager;
    require_once './models/PostManager.php';
    require_once './models/CommentManager.php';
    function listPosts()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $entriesTable = $postManager->getBlogEntries();
        require './views/frontend/listPostsView.php';
    }
    function post($entryID)
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $fetched_entryLine = $postManager->getEntry($entryID);
        $commentsTable = $commentManager->getComments($entryID);
        require './views/frontend/postView.php';
    }
    function showComment($commentID)
    {
        $commentManager = new CommentManager();
        $commentToEdit = $commentManager->getOneComment($commentID);
        require './views/frontend/modifyCommentView.php';
    }
    function addComment($entryID, $author, $content)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($entryID, $author, $content);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire');
        }
        else {
            header('Location: index.php?action=post&id='.$entryID);
        }
    }
    function updateComment($entryID,$commentID, $author, $content)
    {
        $commentManager = new CommentManager();
        $affectedRow = $commentManager->updateComment($commentID, $author, $content);
        if ($affectedRow === false) {
            throw new Exception('Impossible de modifier le commentaire');
        }
        else {
            header('Location: index.php?action=post&id='.$entryID);
        }
    }