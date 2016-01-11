#!/usr/bin/env php
<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 *
 * See the file LICENSE for copying permission.
 */

// 
// Creates a 
// 

$base_dir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
$pharName = 'phpPGN.phar';

$now = new DateTime();
echo $now->format('[Y-m-d H:i:s]: ');
echo "creating $pharName from [$base_dir]...";

$phar = new Phar($pharName, 0, $pharName);

$phar->buildFromDirectory($base_dir);
$phar->setStub($phar->createDefaultStub('stub.php'));

echo "done!\n";