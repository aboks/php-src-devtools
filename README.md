:elephant: php-src-devtools :whale:
===================================
Tools to make it easier to contribute to PHP itself ([php-src](https://github.com/php/php-src)). Uses Docker containers for building, running and testing PHP from source.

Installation
------------
Ensure that [Docker](https://www.docker.com/get-docker) is installed and running on your system. Clone or download this repository somewhere, and ensure that `php-src-devtools` is on your `PATH`.

Usage
-----
In the folder that contains your clone of php-src, run:
* `php-src-devtools build` to build PHP. Note that the initial build may take about an hour.
* `php-src-devtools test` to run the full PHP testsuite. You can use `php-src-devtools test path/to/test.phpt` to run a single test, or `php-src-devtools test ext/foo` to test a single extension.
* `php-src-devtools php` to run the compiled PHP CLI, e.g. `php-src-devtools php -i` for phpinfo.

License
-------
The code is released under the MIT license.
