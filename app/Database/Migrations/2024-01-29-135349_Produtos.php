<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produtos extends Migration
{
    public function up()
    {
        // Criar Tabela
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nomeproduto' =>[
                'type' => 'VARCHAR',
                'constraint'=> 50,
                'null' => false
            ],
            'estoque' =>[
                'type' => 'INT',
                'null' => false
            ],
            'categoria_id' => [
                'type' => 'INT'
            ]
            ]);

            // Criar a PK
            $this->forge->addPrimaryKey('id');

            // Criar a FK
            $this->forge->addForeignKey('categoria_id', 'categorias', 'id');

            // Criar a tabela
            $this->forge->createTable('produtos', true, ['engine' => 'innodb']);
    }

    public function down()
    {
        //
    }
}
