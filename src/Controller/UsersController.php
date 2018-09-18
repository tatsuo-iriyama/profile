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
        $user = $this->Users->newEntity();

        // postデータか判定
        if ($this->request->is('post')) {
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
        }

        $this->render($this->request->action, 'default');
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
        $user = $this->request->session->consume('registerUser');

        if (!$user) {
            // セッションから情報を取得できなかった場合
            throw new BadRequestException('セッションの情報を取得できませんでした');
            return;
        }

        // 入力したパスワードをハッシュ化して渡す
        $user->password_hash = $user['password'];

        if (!$this->Users->save($user)) {
            // DBに格納できなかった場合
            return $this->Flash->error('入力内容を保存できませんでした');
        }

        // 登録内容でそのままログイン
        $this->Auth->setUser($user->toArray());
        $this->redirect('Users/complete');
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