<?php
spl_autoload_register(function ($class_name) {
    $preg_match = preg_match('/^PhpOffice\\\phpspreadsheet\\\/', $class_name);

    if (1 === $preg_match) {
        $class_name = preg_replace('/\\\/', '/', $class_name);
        $class_name = preg_replace('/^PhpOffice\\/phpspreadsheet\\//', '', $class_name);
        require_once(__DIR__ . '../vendor/phpoffice/phpspreadsheet/' . $class_name . '.php');
    }
});

// autoload.php @generated by Composer
/*
require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInita5720a122c4381fc6b42fb071ac4296e::getLoader();*/


?>

