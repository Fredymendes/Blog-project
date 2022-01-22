<?php

namespace App;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([
           __CLASS__,
            'autoload'
        ]);
    }

    public static function autoload($class)
    {
        //récupération de tous le namespace de la classe concernée
        //retrait de App\
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);

        // On remplace les \ par des /
        $class = str_replace('\\', '/', $class);

        $fichier = __DIR__ . '/../' . $class . '.php';

        // Vérification si le fichier existe
        if (file_exists($fichier)) {
            require_once $fichier;
        }
    }
}
