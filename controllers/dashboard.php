<?php
    //controlador home
    require 'src/render.php';

    echo render ('dashboard',[
        'title' => 'DASHBOARD-render',
    ]);