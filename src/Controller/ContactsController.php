<?php

namespace App\Controller;

use App\Controller\AppController;


/**
* Contact Controller
*/
class ContactController extends AppController
{
    public function index()
    {
        $this->render('index');
    }
}
