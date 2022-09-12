<?php
include('init.php');
$app->header();
$app->pager->addString('<title>test</title>');
$str =
    "-------- 5.09.2022 --------
1) создан класс Page для работы с содержимым html страницы.
2) добавлена защита скриптов от прямого вызова в init.php.
3) добавлен trait Singleton в libs.
4) добавлен автолодер
-------- 6.12.2020 --------
1) создан контроллер AppController
2) создан шаблон новостей в templates
-------- 9.12.2020 --------
1)global changes.."
?>


<?php
$app->pager->setProperty("mockHeader", "<pre>$str</pre>");
$app->pager->setProperty("mockFooter", "<h1>ABC</h1>");

$app->footer();
?>