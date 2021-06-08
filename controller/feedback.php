<?php

function feedbackController($params, $action) {

    if(!empty($action)) $action = 'feedback';

    doFeedbackAction($action);
    $params['feedback'] = getAllFeedback();

    $templateName = 'feedback';
    $textarea = strip_tags(htmlspecialchars(($_POST['textarea'])));
    $name = strip_tags(htmlspecialchars(($_POST['name'])));
    $feedback_answer = $_POST['feedback_answer'];

    // Если выбран сайт или не сайт, тоесть товар

    if ($feedback_answer == 'site') {
        feedback_site($name, $textarea);
        $_SESSION['message'] = 'Ваш отзыв добавлен';
        $params['message'] = $_SESSION['message'] ;
        unset($_SESSION['message']);
//        header('Location: /feedback#tabs_03');
    }

//    elseif  ((isset($_POST['feedback_answer']) != 'site') && isset($name)) {
   if  ($_POST['feedback_answer'] != 'site' & isset($_POST['name'])) {
        var_dump('не сайт');
        var_dump($_POST);
    }

    return render($templateName, $params);

}
