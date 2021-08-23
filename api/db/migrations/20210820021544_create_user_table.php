<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Migration\MigrationInterface;

final class CreateUserTable extends AbstractMigration
{
    public function up(): void
    {
        /**
         * @var $table MigrationInterface
         */
        $table = $this->table('users');
        $table->addColumn('username', 'string', ['limit' => 20])
            ->addColumn('name', 'string', ['limit' => 30])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('password', 'string', ['limit' => 64])
            ->addColumn('access_token', 'string', ['limit' => 64])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated', 'datetime', ['default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'])
            ->save();
    }

    public function down(): void
    {
        $this->table('users')->drop()->save();
    }
}
