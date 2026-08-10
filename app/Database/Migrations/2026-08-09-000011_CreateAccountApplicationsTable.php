<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAccountApplicationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'full_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'mobile' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'dob' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'account_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'branch_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'id_proof_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_proof_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_proof_file' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'new',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('account_applications');
    }

    public function down()
    {
        $this->forge->dropTable('account_applications');
    }
}
