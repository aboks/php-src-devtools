<?php
namespace Aboks\PhpSrcDevtools\Command;

use Aboks\PhpSrcDevtools\ConsoleProcessBridge;
use Aboks\PhpSrcDevtools\DockerImage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCommand extends Command
{

    protected function configure()
    {
        $this->setName("build");
        $this->setDescription("Builds PHP from source");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dockerImage = new DockerImage();
        $process = $dockerImage->createProcess('build');
        $process->setTimeout(null);

        return ConsoleProcessBridge::runProcessFromConsole($process, $input, $output);
    }
}
