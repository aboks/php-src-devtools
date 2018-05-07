<?php
namespace Aboks\PhpSrcDevtools;

use Symfony\Component\Process\Process;

class DockerImage
{
    public function createProcess($subcommand, $arguments = []): Process
    {
        $cwd = getcwd();
        if (DIRECTORY_SEPARATOR === '\\') {
            $dockerCwd = $this->convertWindowsPath($cwd);
        } else {
            $dockerCwd = $cwd;
        }

        $cmd = 'docker run -i --rm -v"' . $dockerCwd . '":/src/php-src aboks/php-src-devtools:latest ' . $subcommand;
        if (count($arguments) > 0) {
            $cmd .= ' ' . implode(' ', $arguments);
        }

        return new Process($cmd);
    }

    private function convertWindowsPath(string $path): string
    {
        $path = strtr($path, '\\', '/');
        $path = preg_replace_callback('#^([A-Z]):#', function ($matches) {
            return '/' . strtolower($matches[1]);
        }, $path);

        return $path;
    }
}
