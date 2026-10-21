<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Months\_1735689661;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscribeShape = array{
 *   gross?: int|null, net?: int|null, time?: int|null
 * }
 */
final class Subscribe implements BaseModel
{
    /** @use SdkModel<SubscribeShape> */
    use SdkModel;

    #[Optional]
    public ?int $gross;

    #[Optional]
    public ?int $net;

    #[Optional]
    public ?int $time;

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
        ?int $gross = null,
        ?int $net = null,
        ?int $time = null
    ): self {
        $self = new self;

        null !== $gross && $self['gross'] = $gross;
        null !== $net && $self['net'] = $net;
        null !== $time && $self['time'] = $time;

        return $self;
    }

    public function withGross(int $gross): self
    {
        $self = clone $this;
        $self['gross'] = $gross;

        return $self;
    }

    public function withNet(int $net): self
    {
        $self = clone $this;
        $self['net'] = $net;

        return $self;
    }

    public function withTime(int $time): self
    {
        $self = clone $this;
        $self['time'] = $time;

        return $self;
    }
}
