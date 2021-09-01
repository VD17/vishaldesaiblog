<?php


function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Un titre est requis');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Un contenu est requis');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Veuillez sélectionner un sujet');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Un Post avec un titre similaire existe deja ');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Un Post avec un titre similaire existe deja ');
        }
    }

    return $errors;
}