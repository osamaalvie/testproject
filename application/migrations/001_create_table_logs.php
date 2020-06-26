<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/05/2020
 * Time: 15:17
 */
class Migration_create_table_logs extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'error_level' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
            ),
            'error_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ), 'created_at' => array(
                'type' => 'varchar',
                'constraint' => 250,
                'null' => true,
                'on update' => 'NOW()'
            ), 'updated_at' => array(
                'type' => 'varchar',
                'constraint' => 250,
                'null' => true,
                'on update' => 'NOW()'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('logs');
    }


    public function down()
    {
        $this->dbforge->drop_table('logs');

    }
}