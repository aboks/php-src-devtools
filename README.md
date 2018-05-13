[![Latest Stable Version](https://poser.pugx.org/aboks/php-src-devtools/v/stable)](https://packagist.org/packages/aboks/php-src-devtools)

:elephant: php-src-devtools :whale:
===================================
Tools to make it easier to contribute to PHP itself ([php-src](https://github.com/php/php-src)). Uses Docker containers for building, running and testing PHP from source.

Prerequisites
-------------
Ensure that [Docker](https://www.docker.com/get-docker) is installed and running on your system. 

Installation
------------
The easiest way to install this tool is as a global composer package:
```
$ composer global require aboks/php-src-devtools
```

Alternatively, clone or download this repository somewhere, run `composer install` to install dependencies, and ensure that `php-src-devtools` is on your `PATH`.

Usage
-----
In the folder that contains your clone of php-src, run:
* `php-src-devtools build` to build PHP. Note that the initial build may take about an hour.
* `php-src-devtools test` to run the full PHP testsuite. You can use `php-src-devtools test path/to/test.phpt` to run a single test, or `php-src-devtools test ext/foo` to test a single extension.
* `php-src-devtools php` to run the compiled PHP CLI, e.g. `php-src-devtools php -i` for phpinfo.
* `php-src-devtools list` to see all subcommands, or `php-src-devtools help` for additional help.

Versioning
----------
This project adheres to [Semantic Versioning](http://semver.org/).

License
-------
The code is released under the MIT license.
