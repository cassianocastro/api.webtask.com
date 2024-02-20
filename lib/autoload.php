<?php
declare(strict_types=1);

spl_autoload_register(
    function(string $className): void
    {
        $file = str_replace("\\", DIRECTORY_SEPARATOR, $className);

        require_once "$file.php";
    }
);