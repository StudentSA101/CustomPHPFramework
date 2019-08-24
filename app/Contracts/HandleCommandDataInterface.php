<?php

namespace App\Contracts;

interface HandleCommandDataInterface
{
    public function determine(string $function, array $input = []): string;
}
