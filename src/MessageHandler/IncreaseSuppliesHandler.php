<?php

namespace App\MessageHandler;

use App\Entity\Supplies;
use App\Message\IncreaseSupplies;
use App\Repository\SuppliesRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class IncreaseSuppliesHandler
{
    public function __construct(private readonly SuppliesRepository $suppliesRepository)
    {
    }

    public function __invoke(IncreaseSupplies $message)
    {
        $supplies = $this->suppliesRepository->findOneBy(['userId' => $message->userId]);

        if (null === $supplies) {
            $this->createSupplies($message->userId);
        } else {
            $supplies->setMetal($supplies->getMetal() + $message->metal);
            $supplies->setCristal($supplies->getCristal() + $message->cristal);
            $supplies->setDeuterium($supplies->getDeuterium() + $message->deuterium);
            $this->suppliesRepository->save($supplies, true);
        }
    }

    private function createSupplies(int $userId): void
    {
        $supplies = new Supplies();
        $supplies->setUserId($userId);
        $supplies->setMetal(0);
        $supplies->setCristal(0);
        $supplies->setDeuterium(0);
        $this->suppliesRepository->save($supplies, true);
    }
}
