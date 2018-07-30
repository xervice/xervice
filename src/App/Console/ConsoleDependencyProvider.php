<?php


namespace App\Console;


use Xervice\Console\ConsoleDependencyProvider as XerviceConsoleDependencyProvider;
use Xervice\DataProvider\Console\CleanCommand;
use Xervice\DataProvider\Console\GenerateCommand;
use Xervice\Development\Command\GenerateAutoCompleteCommand;

class ConsoleDependencyProvider extends XerviceConsoleDependencyProvider
{
    /**
     * @return array
     */
    protected function getCommandList(): array
    {
        return array_merge(
            [
                new GenerateCommand(),
                new CleanCommand()
            ],
            $this->getDevCommands()
        );
    }

    protected function getDevCommands()
    {
        $commands = [];

        if (class_exists(GenerateAutoCompleteCommand::class)) {
            $commands[] = new GenerateAutoCompleteCommand();
        }

        return $commands;
    }
}