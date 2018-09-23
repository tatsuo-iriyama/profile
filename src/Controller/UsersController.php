<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\BadRequestException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;

/**
* UsersController
*/
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $user = $this->Users->newEntity();
        $this->set(compact('user'));

        if ($this->request->is('post')) {
            // POSTされたらバリデーションを実施
            // Entity作成
            $validateUser = $this->Users->newEntity($this->request->data, [
                'validate' => 'register'
            ]);

            if ($validateUser->errors()) {
                // バリデーションに引っかかった場合
                $this->Flash->error('入力内容に不備があります');
                $this->set('user', $validateUser);
                return $this->render($this->request->action, 'default');
            }

            // 入力内容をセッションに格納
            $this->request->session()->write('registerUser', $validateUser);

            // 確認画面へ
            return $this->redirect('/Users/confirm');
        }

        if ($this->request->session()->check('registerUser')) {
            // セッションに値が存在する場合は読み込む
            $user = $this->request->session()->read('registerUser');
        }

        // セッションに格納
        $this->request->session()->write('registerUser', $user);

        // GETされた時は入力画面へ
        $this->render($this->request->action, 'default');
        return;
    }

    public function confirm()
    {
        // 入力内容をセッションから取得
        $user = $this->request->session()->read('registerUser');

        if (!$user) {
            // セッションから情報を取得できなかった場合
            throw new BadRequestException('セッションの情報を取得できませんでした');
            return;
        }

        $this->set(compact('user'));
        $this->render($this->request->action, 'default');
    }

    public function save()
    {
        // 入力内容をセッションから取得
        $user = $this->request->session()->consume('registerUser');

        if (!$user) {
            // セッションから情報を取得できなかった場合
            throw new BadRequestException('セッションの情報を取得できませんでした');
            return;
        }

        if (!$this->Users->save($user)) {
            // DBに格納できなかった場合
            return $this->Flash->error('入力内容を保存できませんでした');
        }

        // 登録内容でそのままログイン
        $this->Auth->setUser($user->toArray());
        $this->redirect('/Users/complete');
    }

    public function complete()
    {
        // ログインユーザー情報の取得
        $authUser = $this->Auth->user();

        if (empty($authUser)) {
            // ログインユーザーの取得ができなかった場合
            throw new BadRequestException('登録情報の取得ができませんでした');
            return;
        }

        $this->render($this->request->action, 'default');
    }
}