<?php

/**
 * Этот файл является частью проекта Inely.
 *
 * @link   http://github.com/hirootkit/inely
 *
 * @author hirootkit <admiralexo@gmail.com>
 */

?>

<?php if ($this->params['assignedToMe']): ?>

<li>
    <a class="tooltip-tip ajax-load assignedGroup" href="#">
        <i class="entypo-user-add"></i>
        <span>Поручены мне</span>

        <div class="noft-blue-number counter assign"></div>
    </a>
</li>

<?php endif ?>