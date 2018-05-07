<?php
namespace Aboks\PhpSrcDevtools\Command;

use Aboks\PhpSrcDevtools\ConsoleProcessBridge;
use Aboks\PhpSrcDevtools\DockerImage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{

    protected function configure()
    {
        $this->setName("test");
        $this->setDescription("Runs PHP's test suite");

        $this->addArgument("tests", InputArgument::OPTIONAL, "subset of tests to run");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dockerArguments = [];
        if ($input->hasArgument('tests')) {
            $dockerArguments[] = $input->getArgument('tests');
        }

        $dockerImage = new DockerImage();
        $process = $dockerImage->createProcess('test', $dockerArguments);
        $process->setTimeout(null);

        return ConsoleProcessBridge::runProcessFromConsole($process, $input, $output);
    }
}
