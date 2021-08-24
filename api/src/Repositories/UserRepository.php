<?php

namespace App\Repositories;

use App\Core\Entity\EntityManager;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements BaseRepositoryInterface, UserRepositoryInterface
{
    private EntityManager $em;

    public function setEntityManager(EntityManager $em): void
    {
        $this->em = $em;
    }

    public function getUserByEmail(string $email): array
    {
        return $this->em->query("select * from users where email = ?", [$email]);
    }

    public function auth(array $input): array
    {
        $user = $this->getUserByEmail($input['email']);

        if (!empty($user)) {
            $user = $user[0];
            if (password_verify($input['password'], $user['password'])) {
                unset($user['password']);
                return [
                    'status' => 'success',
                    'data' => [
                        'user' => $user
                    ]
                ];
            }
        }

        return [
            'status' => 'fail',
            'data' => [
                "title" => "Dados informados são inválidos!"
            ]
        ];
    }
}