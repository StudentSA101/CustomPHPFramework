<?php

namespace App\Repository;

use App\Contracts\GetFileContentsInterface;

class GetFileContent implements GetFileContentsInterface
{

    public function get(): array
    {
        return preg_split('/\n/', file_get_contents(
            "/" . trim(__DIR__, 'app/Repository/app/Commands') . "/storage/" . $_SERVER["argv"][1]));
    }

}
