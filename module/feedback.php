<?php
function getAllFeedback() {
    $sql = "SELECT * FROM feedback ORDER BY id DESC";
    return getAssocResult($sql);
}

// Отладка  var_dump($_POST);

function addFeedback() {
    var_dump($_POST);
    die();
}

function deleteFeedback() {
    var_dump($_POST);
    die();
}

function doFeedbackAction($action) {
    if ($action == "add") {
        addFeedBack();
        //header();
    }
    if ($action == "edit") {
        //addFeedBack();
        //header();
    }
    if ($action == "delete") {
        //  addFeedBack();
        //header();
    }
    if ($action == "save") {
        // addFeedBack();
        //header();
    }
}

