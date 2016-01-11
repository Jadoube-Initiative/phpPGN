# phpPGN
Set of PHP code to deal with PGN (Portable Game Notation) files. It is currently designed to understand PGN files only for reading purposes, there is no intention yet to validate the files, it assumes the PGN file is correct (e.g., generated from other tools like [ChassPad](http://www.wmlsoftware.com/chesspad.html)). Validating PGN files can be a future work.

## Development Environment
### Install PHP (Example: command line Ubuntu installation)
```
$ sudo apt-get install php5 php5-fpm php5-sqlite
```

###Install PHPUnit:
```
$ wget https://phar.phpunit.de/phpunit.phar
$ chmod +x phpunit.phar
$ sudo mv phpunit.phar /usr/local/bin/phpunit
$ phpunit --version
PHPUnit x.y.z by Sebastian Bergmann and contributors.
```
*see* [PHPUnit Instructions](https://phpunit.de/manual/current/en/installation.html)

###Install PHPUnit_SkeletonGenerator
```
$ wget https://phar.phpunit.de/phpunit-skelgen.phar
$ chmod +x phpunit-skelgen.phar
$ sudo mv phpunit-skelgen.phar /usr/local/bin/phpunit-skelgen
$ phpunit-skelgen --version
phpunit-skelgen x.y.z by Sebastian Bergmann.
```
*see* [PHPUnit_SkeletonGenerator Instructions](https://github.com/sebastianbergmann/phpunit-skeleton-generator)

###IDE Configuration (Example: Netbeans)
1. IDE Configuration (example Netbeans)
 1. Access menu *Tools* -> *Options* -> *PHP*
 2. Click on *Search* or set manually via *Choose*
2. *Right click on Project* -> *Properties* -> Mark **PHPUnit**
 1. Setup phpunit binary
 2. Setup phpunit-skelgen binary
 3. Setup PHPUnit bootstrap configuration
3. *Right click on Project* -> *Properties* -> *PHPUnit*
 1. **Use Bootstrap** and **Use Bootstrap to create new unit tests**, 
 2. In the same screen, choose `bootstrap.php` file

### Testing (Example: via command line)
In order to check if all configurations succeeded you may want to run the unit tests by executing the following command in the project directory (e.g.: `/home/user/projects/phpPGN`):
```
$ cd /home/user/projects/phpPGN
$ phpunit test --bootstrap="bootstrap.php"

...big output ending with something like:
....                      X / X (100%)

Time: Y ms, Memory: W Mb

OK (X tests, Z assertions)
```
