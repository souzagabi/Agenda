<?php

namespace Base;

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'jv-upload' => array(
        'types' => array(
            'image', 'audio', 'video', 'app', 'thumb', 'text', 'file', 'custom'
        ),
    ),
);
