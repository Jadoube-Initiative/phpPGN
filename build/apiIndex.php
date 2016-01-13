#!/usr/bin/env php
<?php
/*
 * Copyright (c) 2016 Geraldo B. Landre
 *
 * See the file LICENSE for copying permission.
 */

//
// Creates the contento of an index.html file.
// It is supposed to be used by scanning a directory
// containing several subdirectories of API versions.
//

if (count($argv) < 2) {
    echo "[$argv[0]] error: no destination provided!\n";
    exit(1);
}

// autoloading semver classes
spl_autoload_register(
        function ($class) {
            $lib = 'ext' . DIRECTORY_SEPARATOR . 'semver' . DIRECTORY_SEPARATOR . 'src';
            $fileName = $lib . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
            include_once $fileName;
        }
);

use Naneau\SemVer\Sort;

function isValid($path) {
    return $path != 'index.html' && $path != '.' && $path != '..' && $path != 'latest';
}

// getting versions
$d = dir($argv[1]);
$arr = array();
while (false !== ($entry = $d->read())) {
    if(isValid($entry)) {
        $arr[] = $entry;
    }
}
$d->close();

//sorting in semver style
$sorted = Sort::sort($arr);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Versions</title>
        <h1>Versions</h1>
</head>

<body>
    
<?php
//printing up in the reverse order
for ($i = count($sorted) - 1; $i >=0; --$i) {
    $entry = $sorted[$i];
?>
<p><a href="<?= $entry ?>"><?= $entry ?></a></p>
<?php
}
?>

</body>
</html>
