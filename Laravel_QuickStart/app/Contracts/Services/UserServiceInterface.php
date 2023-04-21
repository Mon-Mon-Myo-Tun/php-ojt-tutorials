<?php
namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function getText(): object;
    public function validateText($request): object;
    public function deleteText($tasks): void;
}
