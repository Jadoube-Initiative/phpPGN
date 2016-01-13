#!/usr/bin/env php
<?php
/*
 * Copyright (c) 2016 Geraldo B. Landre
 *
 * See the file LICENSE for copying permission.
 */

// 
// Build a phar file to deploy the library
// 
try {
    $base_dir = $argv[1];
    $pharName = $argv[2];
    $verbose = (count($argv) > 3 && $argv[3] == '-v') ? true : false;

    $now = new DateTime();

    if ($verbose) {
        echo "[$argv[0]] ";
        echo $now->format('Y-m-d H:i:s - ');
        echo "creating [$pharName] from [$base_dir]\n";
    }
    
    if(file_exists(realpath($pharName))) {
        if($verbose) {
            echo "[$argv[0]] ovewriting existent file...\n";
        }
        unlink($pharName);
    }

    $phar = new Phar($pharName, 0, $pharName);

    $phar->buildFromDirectory($base_dir);
    $phar->setStub($phar->createDefaultStub('stub.php'));
} catch (Exception $ex) {
    echo "[$argv[0]] Exception: {$ex->getMessage()}\n";
    if ($verbose) {
        echo $ex->getTraceAsString() + "\n";
    }
    exit(1);
}
echo "[$argv[0]] done!\n";
exit(0);
