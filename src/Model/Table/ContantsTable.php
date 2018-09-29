<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Exception\BadRequestException;


/**
* Contacts Model
*/
class ContactsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize();

        $this->table('contacts');
        $this->hasMany('users', [
            'foreignKey' => 'contact_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        return $validator;
    }
}