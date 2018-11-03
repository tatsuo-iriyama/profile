<?php

use Phinx\Migration\AbstractMigration;

class AddColumnToUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('password_hash', 'string', [
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('tell', 'integer', [
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('email', 'string', [
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('postal_code', 'integer', [
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('address', 'string', [
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('created_at', 'timestamp', [
            'null' => false,
            'default' => 'CURRENT_TIMESTAMP'
        ]);
        $table->addColumn('modified_at', 'timestamp', [
            'null' => false,
            'default' => 'CURRENT_TIMESTAMP',
            'update' => 'CURRENT_TIMESTAMP'
        ]);

        $table->create();
    }
}
