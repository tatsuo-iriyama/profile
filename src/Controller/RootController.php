<?php

namespace App\Controller;

use App\Controller\AppController;


/**
* RootController
*/
class RootController extends AppController
{
    public function index()
    {
        $this->render('/');
    }
}