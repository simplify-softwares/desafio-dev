<?php


use Phinx\Seed\AbstractSeed;

class TransactionType extends AbstractSeed
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
                'type' => 1,
                'description' => 'Débito',
                'signal' => '+'
            ],
            [
                'type' => 2,
                'description' => 'Boleto',
                'signal' => '-'
            ],
            [
                'type' => 3,
                'description' => 'Financiamento',
                'signal' => '-'
            ],
            [
                'type' => 4,
                'description' => 'Crédito',
                'signal' => '+'
            ],
            [
                'type' => 5,
                'description' => 'Recebimento Empréstimo',
                'signal' => '+'
            ],
            [
                'type' => 6,
                'description' => 'Vendas',
                'signal' => '+'
            ],
            [
                'type' => 7,
                'description' => 'Recebimento TED',
                'signal' => '+'
            ],
            [
                'type' => 8,
                'description' => 'Recebimento DOC',
                'signal' => '+'
            ],
            [
                'type' => 9,
                'description' => 'Aluguel',
                'signal' => '-'
            ],
        ];

        $types = $this->table('transaction_type');
        $types->insert($data)
              ->saveData();
    }
}
