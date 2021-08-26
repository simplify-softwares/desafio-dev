<?php


use Phinx\Seed\AbstractSeed;

class Users extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'username' => 'superadmin',
                'name' => "Super Admin",
                'email' => 'admin@admin.com',
                'password' => password_hash('admin',  PASSWORD_DEFAULT),
                'access_token' => substr(hash('sha512', time()), 0, 64)
            ]
        ];

        $types = $this->table('users');
        $types->insert($data)
              ->saveData();
    }
}
