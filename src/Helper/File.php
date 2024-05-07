<?php

namespace App\Helper;

class File
{
    public static function getFilePath()
    {
        $directory = dirname(dirname(__DIR__)) . '/public/excel/' . '/';

        $files = scandir($directory);

        if ($files !== false) {
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'xlsx') {
                    return $directory . $file;
                }
            }
        } else {
            echo "Failed to open directory: $directory\n";
        }
    }

    public static function setNewFileNamePath($fileName)
    {
        return dirname(dirname(__DIR__)) . '/public/excel/'. $fileName .'.xlsx';
    }
}