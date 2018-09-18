<?php

namespace App\Model\Table;

use Cake\I18n\Date;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Exception\BadRequestException;

/**
* Users Model
*/
class UsersTable extends Table
{
    public function validationRegister(Validator $validation)
    {
        // validation of name column
        $validation->notEmpty('name', '名前は必須項目です');

        // validation of hash_password column
        $validation
            ->notEmpty('hash_password', 'パスワードは必須項目です')
            ->add('hash_password', [
                'length' => [
                    'rule' => ['minlength' => 7],
                    'message' => 'パスワードは7文字以上で入力して下さい'
                ],
                'alphaNumeric' => [
                    'rule' => function ($value, $context) {
                        return (bool) preg_match('/^[a-zA-Z0-9]+$/', $value);
                    },
                    'message' => 'パスワードは半角英数字で入力して下さい'
                ]
            ]);

        // validation of tell column
        $validation
            ->notEmpty('tell', '電話番号は必須項目です')
            ->numeric('tell', 'ハイフン抜きの数字のみで入力して下さい');

        // validation of email column
        $validation
            ->notEmpty('email' 'メールアドレスは必須項目です')
            ->add('email', [
                'validFormat' => [
                    'rule' => 'email',
                    'message' => 'メールアドレスが正しくありません'
                ],
                'unique' => [
                    'rule' => 'validateUnique',
                    'message' => '既に登録されているメールアドレスです'
                ]
            ]);

        // validation of postal_code column
        $validation
            ->notEmpty('postal_code', '郵便番号は必須項目です')
            ->add('postal_code', 'custom' [
                'rule' => function ($value, $context) {
                    return (bool) preg_match('/^[0-9]{3}[0-9]{4}+$/', $value);
                },
                'message' => '郵便番号が正しくありません'
            ]);

        // validation of address column
        $validation
            ->notEmpty('address', '住所は必須項目です');

        return $validation;
    }
}