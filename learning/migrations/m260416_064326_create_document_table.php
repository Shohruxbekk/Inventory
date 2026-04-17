<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%document}}`.
 */
class m260416_064326_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'title' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
            'created_at' => $this->integer()->null(),
        ]);
        $this->createTable('{{%document_item}}', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'quantity_unit' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'price_unit' => $this->integer()->notNull(),

        ]);
        $this->createTable('{{%quantity_unit}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
            'created_at' => $this->integer()->null(),
        ]);
        $this->createTable('{{%price_unit}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
            'created_at' => $this->integer()->null(),
        ]);
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
            'created_at' => $this->integer()->null(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%document}}');
    }
}
