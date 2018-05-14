<?php
namespace Aboks\PhpSrcDevtools\Command;

use Aboks\PhpSrcDevtools\ConsoleProcessBridge;
use Aboks\PhpSrcDevtools\DockerImage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PhpCommand extends Command
{

    protected function configure()
    {
        $this->setName("php");
        $this->setDescription("Runs the PHP CLI built from source");

        $this->addOption("info", "-i", InputOption::VALUE_NONE, "show PHP information");

        $this->addArgument("args", InputArgument::IS_ARRAY, "arguments to pass to the PHP CLI");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $arguments = $input->getArgument('args');
        if ($input->hasOption('info')) {
            $arguments[] = '-i';
        }

        $dockerImage = new DockerImage();
        $process = $dockerImage->createProcess('run-cli', $arguments);
        $process->setTimeout(null);

        return ConsoleProcessBridge::runProcessFromConsole($process, $input, $output);
    }
}
