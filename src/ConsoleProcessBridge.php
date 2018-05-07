<?php
namespace Aboks\PhpSrcDevtools;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class ConsoleProcessBridge
{
    public static function runProcessFromConsole(
        Process $process,
        InputInterface $consoleInput,
        OutputInterface $consoleOutput
    ): int {
        if ($consoleOutput instanceof ConsoleOutputInterface) {
            $errorOutput = $consoleOutput->getErrorOutput();
        } else {
            $errorOutput = $consoleOutput;
        }

        $process->start(function ($type, $data) use ($consoleOutput, $errorOutput) {
            if ($type === Process::OUT) {
                $consoleOutput->write($data);
            } elseif ($type === Process::ERR) {
                $errorOutput->write($data);
            }
        });
        $process->wait();

        return $process->getExitCode();
    }
}
