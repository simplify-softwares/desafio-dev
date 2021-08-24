<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateStoreTransactionTable extends AbstractMigration
{
    public function up(): void
    {
        /**
         * @var $table MigrationInterface
         */
        $table = $this->table('store_transaction');
        $table->addColumn(  'type', 'integer')
                ->addColumn('transaction_date', 'datetime')
                ->addColumn('price', 'decimal', ['limit' => 10, 'precision' => 2])
                ->addColumn('cpf', 'string', ['limit' => 11])
                ->addColumn('card', 'string', ['limit' => 12])
                ->addColumn('store_id', 'integer')
                ->save();
        
        $this->execute("ALTER TABLE `store_transaction` ADD CONSTRAINT `fk_store_transaction_transaction_type` 
                        FOREIGN KEY (`type`) REFERENCES `transaction_type`(`type`) 
                        ON DELETE RESTRICT ON UPDATE RESTRICT; ");        
        
        $this->execute("ALTER TABLE `store_transaction` ADD CONSTRAINT `fk_store_transaction_store`
                        FOREIGN KEY (`store_id`) REFERENCES `store`(`id`)
                        ON DELETE RESTRICT ON UPDATE RESTRICT; ");
    }

    public function down(): void
    {
        $this->table('store_transaction')->drop()->save();
    }
}
