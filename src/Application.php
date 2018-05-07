<?php
namespace Aboks\PhpSrcDevtools;

use Aboks\PhpSrcDevtools\Command\BuildCommand;
use Aboks\PhpSrcDevtools\Command\PhpCommand;
use Aboks\PhpSrcDevtools\Command\TestCommand;
use Symfony\Component\Console\Application as ConsoleApplication;

class Application extends ConsoleApplication
{
    public function __construct()
    {
        parent::__construct("php-src-devtools");

        $this->add(new BuildCommand());
        $this->add(new TestCommand());
        $this->add(new PhpCommand());
    }
}
