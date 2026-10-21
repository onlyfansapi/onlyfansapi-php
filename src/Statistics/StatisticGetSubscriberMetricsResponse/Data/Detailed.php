<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DetailedShape = array{
 *   freeSubscriptions?: int|null,
 *   paidSubscriptions?: int|null,
 *   unknownSubscriptions?: int|null,
 * }
 */
final class Detailed implements BaseModel
{
    /** @use SdkModel<DetailedShape> */
    use SdkModel;

    #[Optional('free_subscriptions')]
    public ?int $freeSubscriptions;

    #[Optional('paid_subscriptions')]
    public ?int $paidSubscriptions;

    #[Optional('unknown_subscriptions')]
    public ?int $unknownSubscriptions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $freeSubscriptions = null,
        ?int $paidSubscriptions = null,
        ?int $unknownSubscriptions = null,
    ): self {
        $self = new self;

        null !== $freeSubscriptions && $self['freeSubscriptions'] = $freeSubscriptions;
        null !== $paidSubscriptions && $self['paidSubscriptions'] = $paidSubscriptions;
        null !== $unknownSubscriptions && $self['unknownSubscriptions'] = $unknownSubscriptions;

        return $self;
    }

    public function withFreeSubscriptions(int $freeSubscriptions): self
    {
        $self = clone $this;
        $self['freeSubscriptions'] = $freeSubscriptions;

        return $self;
    }

    public function withPaidSubscriptions(int $paidSubscriptions): self
    {
        $self = clone $this;
        $self['paidSubscriptions'] = $paidSubscriptions;

        return $self;
    }

    public function withUnknownSubscriptions(int $unknownSubscriptions): self
    {
        $self = clone $this;
        $self['unknownSubscriptions'] = $unknownSubscriptions;

        return $self;
    }
}
