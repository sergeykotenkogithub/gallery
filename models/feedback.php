<?php

//........................db.........................................

function getAllFeedback() {
    $sql = "SELECT * FROM feedback WHERE it_is = 'product' ORDER BY id DESC";
    return getAssocResult($sql);
}

function  getAllFeedbackSite() {
    $sql = "SELECT * FROM feedback WHERE it_is = 'site' ORDER BY id DESC";
    return getAssocResult($sql);
}



function feedbackAdd($name, $feedback, $feedback_id) {
    $sql = "INSERT INTO feedback (`name`, feedback, goods_id) VALUE ('$name', '$feedback', '$feedback_id')";
    return getOneResultInto($sql);
}

function feedback_site($name, $textarea) {
    $sql = "INSERT INTO feedback(`name`, feedback, it_is) VALUES ('$name', '$textarea', 'site')";
    return getOneResultInto($sql);
}

function feedback_goods($name, $textarea, $feedback_answer) {
    $sql = "INSERT INTO feedback(`name`, feedback, goods_id) VALUES ('$name', '$textarea', $feedback_answer)";
    return getOneResultInto($sql);
}

//..................................................................

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


