<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTransactionTypeTable extends AbstractMigration
{
    public function up(): void
    {
        /**
         * @var $table MigrationInterface
         */
        $table = $this->table('transaction_type');
        $table->addColumn('type', 'integer')
                ->addColumn('description', 'string', ['limit' => 150])
                ->addColumn('signal', 'char', ['limit' => 1])
                ->addIndex(['type'])
                ->save();
    }

    public function down(): void
    {
        $this->table('transaction_type')->drop()->save();
    }
}
