<?php

declare(strict_types=1);

namespace OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse\Data\Earning;
use OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse\Data\Subscribe;

/**
 * @phpstan-import-type EarningShape from \OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse\Data\Earning
 * @phpstan-import-type SubscribeShape from \OnlyFansAPI\Subscribers\SubscriberGetStatisticsResponse\Data\Subscribe
 *
 * @phpstan-type DataShape = array{
 *   delta?: float|null,
 *   earnings?: list<Earning|EarningShape>|null,
 *   subscribers?: int|null,
 *   subscribes?: list<Subscribe|SubscribeShape>|null,
 *   total?: float|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?float $delta;

    /** @var list<Earning>|null $earnings */
    #[Optional(list: Earning::class)]
    public ?array $earnings;

    #[Optional]
    public ?int $subscribers;

    /** @var list<Subscribe>|null $subscribes */
    #[Optional(list: Subscribe::class)]
    public ?array $subscribes;

    #[Optional]
    public ?float $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Earning|EarningShape>|null $earnings
     * @param list<Subscribe|SubscribeShape>|null $subscribes
     */
    public static function with(
        ?float $delta = null,
        ?array $earnings = null,
        ?int $subscribers = null,
        ?array $subscribes = null,
        ?float $total = null,
    ): self {
        $self = new self;

        null !== $delta && $self['delta'] = $delta;
        null !== $earnings && $self['earnings'] = $earnings;
        null !== $subscribers && $self['subscribers'] = $subscribers;
        null !== $subscribes && $self['subscribes'] = $subscribes;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withDelta(float $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }

    /**
     * @param list<Earning|EarningShape> $earnings
     */
    public function withEarnings(array $earnings): self
    {
        $self = clone $this;
        $self['earnings'] = $earnings;

        return $self;
    }

    public function withSubscribers(int $subscribers): self
    {
        $self = clone $this;
        $self['subscribers'] = $subscribers;

        return $self;
    }

    /**
     * @param list<Subscribe|SubscribeShape> $subscribes
     */
    public function withSubscribes(array $subscribes): self
    {
        $self = clone $this;
        $self['subscribes'] = $subscribes;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
