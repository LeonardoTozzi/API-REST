<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorias extends Migration
{
    public function up()
    {
        // COnfiguração par criar a tabela
        $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'auto_increment' => true
                ],
                'descricaocategoria' => [
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                    'null' => false
                ]
        ]);

        //criar a chave primarira
        $this->forge->addPrimaryKey('id');

        //criar a table
        $this->forge->createTable('categorias', true, ['ENGINE' => 'InnoDB']);

    }

    public function down()
    {
        // Excluir a tabela
    }
}
