<?php

function feedbackController($params, $action) {

    if(!empty($action)) $action = 'feedback';

    doFeedbackAction($action);
    $params['feedback'] = getAllFeedback();

    $templateName = 'feedback';

    return render($templateName, $params);
}
