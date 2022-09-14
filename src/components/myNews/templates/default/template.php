<?php
if (!defined('JOIN_CORE') || !JOIN_CORE) die(); ?>
<h1 class="abc"><?= $result['h1']; ?> </h1>

<pre>
 "-------- 5.09.2022 --------
1) создан класс Page для работы с содержимым html страницы.
2) добавлена защита скриптов от прямого вызова в init.php.
3) добавлен trait Singleton в libs.
4) добавлен автолодер
-------- 6.09.2022 --------
1) создан контроллер AppController
2) создан шаблон новостей в templates
-------- 9.09.2022 --------
1)global changes.."
-------- 11.09.2022 -------
1)фикс краша приложения при отключении setProperty()
2)фикс методов addJs() addCss()
3)мелкие исправления
-------- 12.09.2022 -------
1)создан класс Dictionary IteratorAggregate, ArrayAccess, Countable
2)созданы два класса-наследник Dictionary->(Request,Server)
3)в Application созан метод includeComponent и реализован
4)создан класс DefaultComponent наследующий класс Base в директории компонента myNews
5)переопределен и реализован абстрактный метод executeComponent()
6)создана структура компонента, добавлены стили и javascript
7)создан и реализован класс Template и его метод render, подключающий шаблон компонента со стилями и скриптами в случае их наличия
</pre>
