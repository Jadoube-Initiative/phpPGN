#!/usr/bin/env php
<?php
$phar = new Phar($argv[1]);
$phar->extractTo($argv[2]);
