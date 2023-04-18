<?php

namespace App\Message;

final class IncreaseSupplies
{
    public function __construct(
        public readonly int $userId,
        public readonly int $metal,
        public readonly int $cristal,
        public readonly int $deuterium
    ) {
    }
}
