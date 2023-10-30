<?php
    //controlador home
    require 'src/render.php';

    echo render ('settings',[
        'title' => 'Settings-render',
    ]);