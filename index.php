<?php
include('src/init.php');
$app->header();
$app->pager->addString('<title>EPAM</title>');
$app->includeComponent('myNews', 'default', ['h1' => "Project history"]);
$app->pager->setProperty("mockHeader","BODYHEADER");
$app->pager->setProperty("mockFooter","Footer");
$app->footer();
?>