<?php
require 'controller/frontend.php';
try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post($_GET['id']);
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment'){
            if (isset($_GET['id']) AND ($_GET['id'] != '')){
                if (isset($_POST['newComment_author']) AND ($_POST['newComment_author'] != '')){
                    if (isset($_POST['newComment_content']) AND ($_POST['newComment_content'] != '')){
                        addComment ($_GET['id'],$_POST['newComment_author'],$_POST['newComment_content']);
                    }
                    else{
                        throw new Exception('Erreur : commentaire vide !');
                    }
                }
                else {
                    throw new Exception('Erreur : pseudo vide !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'showComment'){
            if (isset($_GET['commentID']) AND ($_GET['commentID'] != '')){
                showComment ($_GET['commentID']);
            } else {
                throw new Exception('Erreur : commentaire inexistant');
            }
        }
        elseif ($_GET['action'] == 'updateComment'){
            if (isset($_GET['commentID']) AND ($_GET['commentID'] != '')){
                if (isset($_POST['updateComment_author']) AND ($_POST['updateComment_author'] != '')){
                    if (isset($_POST['updateComment_content']) AND ($_POST['updateComment_content'] != '')){
                        updateComment ($_GET['entryID'],$_GET['commentID'],$_POST['updateComment_author'],$_POST['updateComment_content']);
                    }
                    else{
                        throw new Exception('Erreur : commentaire vide !');
                    }
                }
                else {
                    throw new Exception('Erreur : pseudo vide !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e){
    $errorMessage = $e->getMessage();
    require './views/frontend/errorView.php';
}