<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\Streams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type EarningsShape = array{
 *   delta?: int|null, gross?: int|null, total?: int|null
 * }
 */
final class Earnings implements BaseModel
{
    /** @use SdkModel<EarningsShape> */
    use SdkModel;

    #[Optional]
    public ?int $delta;

    #[Optional]
    public ?int $gross;

    #[Optional]
    public ?int $total;

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
        ?int $delta = null,
        ?int $gross = null,
        ?int $total = null
    ): self {
        $self = new self;

        null !== $delta && $self['delta'] = $delta;
        null !== $gross && $self['gross'] = $gross;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withDelta(int $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }

    public function withGross(int $gross): self
    {
        $self = clone $this;
        $self['gross'] = $gross;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
