<?php

namespace App\Controller;

use App\Controller\AppController;

/**
* LoginController
*/
class LoginController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function login()
    {
        // postデータかを判定
        if ($this->request->is('post')) {
            // リクエスト情報を使用してユーザーの識別
            $user = $this->Auth->identify();

            if ($user) {
                // 認証した場合ユーザー情報を保存
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('メールアドレス、またはパスワードが不正です。');
            }
        }
    }

    public function logout()
    {
        $this->request->session()->destroy();
    }
}
