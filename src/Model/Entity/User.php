<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $name_sei
 * @property string $name_mei
 * @property int $gender
 * @property \Cake\I18n\Time $birthday
 * @property string $tel
 * @property string $password_hash
 * @property string $postal_code
 * @property int $prefecture_id
 * @property \App\Model\Entity\MasterPrefecture $prefecture
 * @property string $address
 * @property int $has_confirmed_email
 * @property string $building
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    // パスワードをハッシュ化して格納
    protected function _setPasswordHash($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}