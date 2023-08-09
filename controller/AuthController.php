<?php

require_once 'AppController.php';

class AuthController extends AppController {

    public function index($f3) {

        $f3->set('content', '../ui/pages/auth/index.html');

        echo Template::instance()->render('template.htm');
    }


}
