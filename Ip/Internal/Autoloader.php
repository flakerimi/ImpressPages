<?php

/**
 * @package ImpressPages
 *
 *
 */
namespace Ip;


/**
 * Autoloader class
 */

class Autoloader {
    public function load($name)
    {

        $fileName = str_replace('\\', '/', $name) . '.php';
        if($fileName[0] == '/') { //in some environments required class starts with slash. In that case remove the slash.
            $fileName = substr($fileName, 1);
        }

        if (file_exists(ipConfig()->baseFile($fileName))) {
            require_once ipConfig()->baseFile($fileName);
            return true;
        }

        $vendorFile = ipConfig()->baseFile('Ip' . DIRECTORY_SEPARATOR . 'Internal' . DIRECTORY_SEPARATOR . 'Vendor' . DIRECTORY_SEPARATOR . $fileName);
        if (file_exists($vendorFile)) {
            require_once $vendorFile;
            return true;
        }

        return false;

    }


}


