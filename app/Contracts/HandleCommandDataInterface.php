<?php

namespace App\Contracts;

interface HandleCommandDataInterface
{
    public static function determine(string $function, array $input = []): string;
}
