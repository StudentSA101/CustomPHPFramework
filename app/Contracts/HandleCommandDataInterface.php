<?php

namespace App\Contracts;

/**
 * Interface for command datahandling
 */
interface HandleCommandDataInterface
{
    public function determine(string $function, array $input = []): string;
}
