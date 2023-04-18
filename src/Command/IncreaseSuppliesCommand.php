<?php

namespace App\Command;

use App\Message\IncreaseSupplies;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:increase-supplies',
    description: 'increase supplies',
)]
class IncreaseSuppliesCommand extends Command
{
    public function __construct(private readonly MessageBusInterface $bus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        while(true) {
            $io->writeln('Increasing supplies...');
            $this->bus->dispatch(
                new IncreaseSupplies(
                    userId: 1,
                    metal: 4,
                    cristal: 2,
                    deuterium: 1
                )
            );
            sleep(1);
        }

        return Command::SUCCESS;
    }
}
