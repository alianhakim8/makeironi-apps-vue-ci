<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
	// create
	public function up()
	{
		// buat field
		// insert into products values(value sesuai field)
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'product_name'  => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'product_desc' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'variant' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'images' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('products');
	}

	// remove
	public function down()
	{
		$this->forge->dropTable('products');
	}
}
