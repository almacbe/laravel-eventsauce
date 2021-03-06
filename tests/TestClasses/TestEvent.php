<?php

namespace Spatie\LaravelEventSauce\Tests\TestClasses;

use EventSauce\EventSourcing\Serialization\SerializableEvent;

class TestEvent implements SerializableEvent
{
    /** @var int */
    public $number;

    public function __construct(int $number
    ) {
        $this->number = $number;
    }

    public function amount(): int
    {
        return $this->number;
    }

    public static function fromPayload(array $payload): SerializableEvent
    {
        return new self(
            (int) $payload['amount']
        );
    }

    public function toPayload(): array
    {
        return [
            'amount' => (int) $this->number,
        ];
    }

    public static function withAmount(int $amount): MoneySubtracted
    {
        return new MoneySubtracted(
            $amount
        );
    }
}
