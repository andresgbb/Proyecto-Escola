<?php
    //controlador home
    require 'src/render.php';

    echo render ('register',[
        'title' => 'Register-render',
    ]);