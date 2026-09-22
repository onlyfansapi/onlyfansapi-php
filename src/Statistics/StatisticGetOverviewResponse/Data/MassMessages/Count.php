<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\StatisticGetOverviewResponse\Data\MassMessages;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type CountShape = array{delta?: float|null, total?: int|null}
 */
final class Count implements BaseModel
{
    /** @use SdkModel<CountShape> */
    use SdkModel;

    #[Optional]
    public ?float $delta;

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
    public static function with(?float $delta = null, ?int $total = null): self
    {
        $self = new self;

        null !== $delta && $self['delta'] = $delta;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withDelta(float $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
