<?php

namespace App\Repository;

use App\Contracts\GetFileContentsInterface;

/**
 * Class to parse the input files
 */
class GetFileContent implements GetFileContentsInterface
{
    /**
     * Parses input file into correct format
     *
     * @return array
     */
    public function get(): array
    {
        return preg_split('/\n/', file_get_contents(
            "/" . trim(__DIR__, 'app/Repository/app/Commands') . "/storage/" . $_SERVER["argv"][1]));
    }

}
