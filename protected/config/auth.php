<?php

return array(
    'moderator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Модератор',
        'bizRule' => null,
        'data' => null
    ),
    'administrator' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Администратор',
        'children' => array(
            'moderator',
        ),
        'bizRule' => null,
        'data' => null
    ),
);
?>
