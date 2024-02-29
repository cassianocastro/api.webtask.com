<?php
declare(strict_types=1);

namespace api\models;

use Exception;

/**
 *
 */
final class InputReader
{

    public function read(): array
    {
        $content = file_get_contents("php://input");

        if ( $content !== "" )
        {
            $array = json_decode($content, true);

            return $array;
        }

        throw new Exception("Empty stream!");
    }
}