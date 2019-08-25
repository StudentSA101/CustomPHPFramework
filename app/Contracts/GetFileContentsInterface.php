<?php

namespace App\Contracts;

/**
 * Interface for file parsers
 */
interface GetFileContentsInterface
{
    public function get(): array;

}
