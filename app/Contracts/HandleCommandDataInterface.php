<?php

namespace App\Contracts;

interface HandleCommandDataInterface
{
    public function determine(array $function): string;

}
