#!/usr/bin/env php
<?php
/*
 * Copyright (c) 2016 Geraldo B. Landre
 *
 * See the file LICENSE for copying permission.
 */

//
// Creates the contents of a redirector to the Latest version API doc.
// It is supposed to be used by scanning a directory
//

if (count($argv) < 2) {
    echo "[$argv[0]] error: no destination provided!\n";
    exit(1);
}
?>
<html><head>
  <meta http-equiv="Refresh" content="0; url=http://jadoube-initiative.github.io/phpPGN/api/<?=$argv[1]?>/">
</head><body>
</body></html>