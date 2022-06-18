<?php

namespace models;

use core\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $email ='';
    public string $password='';
    public string $confirmPass='';
    public int $status;

    public function getTableName(): string
    {
        return 'users';
    }

    public function getPrimaryKey(): string
    {
        return 'id';
    }

    public function save(): bool
    {
        $this->status=self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE,'class'=>self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPass' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function getAttributes(): array
    {
        return ['email', 'password', 'status'];
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}