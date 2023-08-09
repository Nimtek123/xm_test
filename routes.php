<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Admin
 */

// $f3->route('GET|POST /', function($f3) {
//     if (empty($f3->get('SESSION.USER.id'))) {
//         $f3->reroute('/login');
//     } else {
//         $f3->reroute('/index');
//     }
// });
$f3->route('GET /', 'AuthController->index');

