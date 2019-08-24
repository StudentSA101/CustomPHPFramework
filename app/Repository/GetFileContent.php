<?php

namespace App\Repository;

class HandleInput implements GetFileContentsInterface
{

    public function get()
    {
        return preg_split('/\n/', file_get_contents(
            "/" . trim(__DIR__, 'app/Commands') . "/storage/" . $_SERVER["argv"][1]));
    }

}
