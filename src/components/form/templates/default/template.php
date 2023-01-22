<?php
if (!defined('JOIN_CORE') || !JOIN_CORE) die();
require 'interface_creator.php' ?>
<!--создать форму, придумать место вставки php-->

<div class="container">
    <form
        <?php echo getProperties($result);echo getAttributes($result['attr'] ?? ''); ?>>
        <?php renderInputTags($result); ?>
    </form>
</div>


