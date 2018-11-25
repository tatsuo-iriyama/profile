<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vue Controller
 *
 * @property \App\Model\Table\VueTable $Vue
 */
class VueController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->render($this->request->action, 'default');
    }
}
