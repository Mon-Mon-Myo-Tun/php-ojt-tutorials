<?php

namespace App\Contracts\Dao;

interface UserDaoInterface
{
    public function getText(): object;
    public function validateText($request): object;
    public function deleteText($tasks): void;
}
