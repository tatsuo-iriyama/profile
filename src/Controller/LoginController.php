<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Login Controller
 *
 * @property \App\Model\Table\LoginTable $Login
 */
class LoginController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function login()
    {
        if ($this->request->is('post')) {
            // POSTデータの場合、リクエスト情報を使用してユーザーの識別
            $user = $this->Auth->identify();

            if ($user) {
                // 認証した場合、ユーザー情報を保存
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                // 認証できなかった場合、エラーメッセージ表示
                $this->Flash->error('メールアドレス、またはパスワードが不正です。');
            }
        }

        $this->render($this->request->action, 'default');
    }

    public function logout()
    {
        // sessionの削除
        $this->request->session()->destroy();
    }
}