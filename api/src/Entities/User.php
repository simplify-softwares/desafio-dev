<?php

namespace App\Entities;

use DateTime;
use DateTimeInterface;
use App\Core\Entity\EntityInterface;

class User implements EntityInterface
{
    private int $id;
    private string $name;
    private string $username;
    private string $email;
    private string $password;
    private string $access_token;
    private DateTimeInterface $created;
    private DateTimeInterface $updated;

    public static function tableName(): string
    {
        return 'users';
    }

    public static function primaryKey(): string
    {
        return "id";
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of username
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of access_token
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * Set the value of access_token
     *
     * @param string $access_token
     *
     * @return self
     */
    public function setAccessToken(string $access_token): self
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * Get the value of created
     *
     * @return DateTimeInterface
     */
    public function getCreated(): DateTimeInterface
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param DateTimeInterface $created
     *
     * @return self
     */
    public function setCreated(DateTimeInterface $created): self
    {
        $this->created = new DateTime($created);
        return $this;
    }

    /**
     * Get the value of updated
     *
     * @return DateTimeInterface
     */
    public function getUpdated(): DateTimeInterface
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @param DateTimeInterface $updated
     *
     * @return self
     */
    public function setUpdated(DateTimeInterface $updated): self
    {
        $this->updated = new DateTime($updated);
        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
}