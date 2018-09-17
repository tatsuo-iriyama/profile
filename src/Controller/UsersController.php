<?php

namespace App\Controller;

use App\Controller\AppController;

/**
* UsersController
*/
class UsersController extends AppController
{
    public function index()
    {
        $this->render($this->request->action, 'default');
    }
}