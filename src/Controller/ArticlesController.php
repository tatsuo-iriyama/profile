<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Http\Client;

/**
* Articles Controller
*/
class ArticlesController extends AppController
{
    public function qiita()
    {
        // curlの初期化
        $ch = curl_init();
        // 使用するURL
        $url = "https://qiita.com/api/v2/authenticated_user/items?page=1&per_page=5";
        // curlのオプション設定
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array(
                // データの形式、文字コード記載
                'Content-Type: application/json; charser=UTF-8',
                // 自身のアクセストークン
                'Authorization: Bearer ' . "bc1715dcfe74db0805e88083fca75396676d027b"
            ),
            // 返り値を文字列で取得
            CURLOPT_RETURNTRANSFER => true,
            // HTTPメソッド指定
            CURLOPT_CUSTOMREQUEST => 'GET',
        );
        // 複数のオプションを設定
        curl_setopt_array($ch, $options);
        // curlの実行
        $json = curl_exec($ch);
        // curlを閉じる
        curl_close($ch);
        // json文字列をデコード
        $results = json_decode($json);

        $this->set(compact('results'));

        $this->render($this->request->action, 'default');
    }
}
