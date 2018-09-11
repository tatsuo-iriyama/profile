<?php

namespace App\Controller;

use App\Controller\AppController;


/**
* ProfileController
*/
class ProfileController extends AppController
{
    public function index()
    {
        $this->render('index');
    }
}