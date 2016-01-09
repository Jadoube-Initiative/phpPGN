# phpPGN
Set of PHP code to deal with PGN (Portable Game Notation) files

## Development Environment
### Install PHP
1. Installation (example Command line Ubuntu installation)
```
$ sudo apt-get install php5 php5-fpm php5-sqlite
```
2. IDE Configuration (example Netbeans)
* Access menu *Tools* -> *Options* -> *PHP*
* Click on *Search* or set manually via *Choose*

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
1. *Right click on Project* -> *Properties* -> Mark **PHPUnit**
 1. Setup phpunit binary
 2. Setup phpunit-skelgen binary
 3. Setup PHPUnit bootstrap configuration
2. *Right click on Project* -> *Properties* -> *PHPUnit*
 1. **Use Bootstrap** and **Use Bootstrap to create new unit tests**, 
 2. In the same screen, choose bootstrap.php file
