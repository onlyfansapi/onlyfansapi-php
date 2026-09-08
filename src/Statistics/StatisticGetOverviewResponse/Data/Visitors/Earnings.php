<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\Visitors;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type EarningsShape = array{
 *   delta?: float|null, gross?: float|null, total?: float|null
 * }
 */
final class Earnings implements BaseModel
{
    /** @use SdkModel<EarningsShape> */
    use SdkModel;

    #[Optional]
    public ?float $delta;

    #[Optional]
    public ?float $gross;

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
     */
    public static function with(
        ?float $delta = null,
        ?float $gross = null,
        ?float $total = null
    ): self {
        $self = new self;

        null !== $delta && $self['delta'] = $delta;
        null !== $gross && $self['gross'] = $gross;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withDelta(float $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }

    public function withGross(float $gross): self
    {
        $self = clone $this;
        $self['gross'] = $gross;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
