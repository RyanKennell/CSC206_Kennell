<?php


/* 	Start-up activities prior to loading the page content.  This will make a connection
 *	to the database and start a session.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

// Include the template files needed for the page
require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'createUserTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');

// Include the User class
require_once(FS_INCLUDES . 'user.php');


// Load page header
$header = new mainHeaderTemplate();
echo $header->renderStatic();

if ($requestType == 'GET') {

    // Show the Create User Form
    $form = new createUserTemplate();
    echo $form->render();

} else {

    // Process form data
    $formData = $_POST;
    $formData['created_at'] = date('Y-m-d H:i:s', time());

    // Create User object and save data to the database
    $u = new User($db);
    $r = $u->create($formData);

    // When done, redirect to a web page
    header('Location: http://csc206dev.com/index.php');

}


// Load page header
$footer = new mainFooterTemplate();
echo $footer->renderStatic();


