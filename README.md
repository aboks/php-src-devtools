[![Latest Stable Version](https://poser.pugx.org/aboks/php-src-devtools/v/stable)](https://packagist.org/packages/aboks/php-src-devtools)

:elephant: php-src-devtools :whale:
===================================
Tools to make it easier to contribute to PHP itself ([php-src](https://github.com/php/php-src)). Uses Docker containers for building, running and testing PHP from source.

```
$ composer global require aboks/php-src-devtools
$ git clone https://github.com/php/php-src.git && cd php-src
# write a test, or make your own changes to PHP
$ php-src-devtools test
```

Why?
----
Even though there is a thriving open source community for projects written in PHP, only a very limited number of these people contribute to PHP itself. This can partly be explained by the fact that contributing to PHP internals is quite different from contributing to a PHP project: it uses a different language (C instead of PHP), different tools, and another workflow. 

This project aims to remove some of these barriers for PHP developers to become PHP core developers:

* Compiling and testing PHP within a Docker container removes the need to install any build dependencies, which can clutter your system or not be easily available for your OS. In particular, it provides a greatly simplified path to get started for Windows users. 
* Most PHP developers will be used to installing tools like this using Composer.
* Using tools that PHP developers might be already using (Symfony Console and Docker) provides a familiar experience.
* The console application abstracts some of the necessary build steps away, and makes the possible actions discoverable.

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

Status
------
This tool is still in a pretty experimental stage, but the basic things like building PHP from source and running tests should work fine. Please try it out and report any issues and possible improvements that you encounter. Pull requests are welcome.

Versioning
----------
This project adheres to [Semantic Versioning](http://semver.org/).

License
-------
The code is released under the MIT license.
