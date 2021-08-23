<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateStoreTable extends AbstractMigration
{
    public function up(): void
    {
        /**
         * @var $table MigrationInterface
         */
        $table = $this->table('store');
        $table->addColumn('owner', 'string', ['limit' => 14])
                ->addColumn('name', 'string', ['limit' => 19])
                ->save();
    }

    public function down(): void
    {
        $this->table('store')->drop()->save();
    }
}
