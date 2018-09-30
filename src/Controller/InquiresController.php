<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\BadRequestException;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Event\Event;


/**
* Inquires Controller
*/
class InquiresController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Inquires');
    }

    public function index()
    {
        $inquires = $this->Inquires->newEntity();
        $this->set(compact('inquires'));

        if ($this->request->is('post')) {
            // POSTされた場合
            $userInquires = $this->Inquires->newEntity($this->request->data, [
                'validate' => 'default'
            ]);

            if ($userInquires->errors()) {
                /*
                 * バリデーションに引っかかった場合、エラーメッセージを表示し
                 * 入力内容をセット後、入力画面に遷移する。
                 */
                $this->Flash->error('入力内容に不備があります');
                $this->set('inquires', $userInquires);
                return $this->render($this->request->action, 'default');
            }

            // 入力内容をセッションに格納し、確認画面へリダイレクトする
            $this->request->session()->write('inquires', $userInquires);
            return $this->redirect('/Inquires/confirm');
        }

        return $this->render($this->request->action, 'default');
    }

    public function confirm()
    {
        // セッションから入力内容取得
        $userInquires = $this->request->session()->read('inquires');

        if (empty($userInquires)) {
            // セッションの情報を取得できなかった場合は、例外を投げる
            throw new BadRequestException('セッションの情報を取得できませんでした');
            return;
        }

        $this->set('inquires', $userInquires);
        $this->render($this->request->action, 'default');
    }

    public function complete()
    {
        // セッションから入力内容取得
        $userInquires = $this->request->session()->consume('inquires');

        if (empty($userInquires)) {
            // セッションの情報を取得できなかった場合は、例外を投げる
            throw new BadRequestException('セッション情報を取得できませんでした');
            return;
        }

        $userInquires->user_id = $this->Auth->user()['id'];

        if (!$this->Inquires->save($userInquires)) {
            return $this->Flash->error('入力内容を保存できませんでした');
        }

        // 入力内容を保存する
        $this->Inquires->save($userInquires);
        $this->render($this->request->action, 'default');
    }

    public function history()
    {
        $userId = $this->Auth->user()['id'];

        $inquires = $this->Inquires
            ->find()
            ->where(['user_id' => $userId])
            ->order(['created_at' => 'desc'])
            ->all();

        foreach ($inquires as $inquire) {
            if (!empty($inquire)) {
                $inquireHistories[] = $inquire;
            }
        }
        $this->set(compact('inquireHistories'));

        $this->render($this->request->action, 'default');
    }
}
