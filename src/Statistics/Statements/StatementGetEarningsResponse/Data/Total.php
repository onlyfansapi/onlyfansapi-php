<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse\Data\Total\ChartAmount;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse\Data\Total\ChartCount;

/**
 * @phpstan-import-type ChartAmountShape from \OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse\Data\Total\ChartAmount
 * @phpstan-import-type ChartCountShape from \OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse\Data\Total\ChartCount
 *
 * @phpstan-type TotalShape = array{
 *   chartAmount?: list<ChartAmount|ChartAmountShape>|null,
 *   chartCount?: list<ChartCount|ChartCountShape>|null,
 *   delta?: float|null,
 *   gross?: float|null,
 *   total?: float|null,
 * }
 */
final class Total implements BaseModel
{
    /** @use SdkModel<TotalShape> */
    use SdkModel;

    /** @var list<ChartAmount>|null $chartAmount */
    #[Optional(list: ChartAmount::class)]
    public ?array $chartAmount;

    /** @var list<ChartCount>|null $chartCount */
    #[Optional(list: ChartCount::class)]
    public ?array $chartCount;

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
     *
     * @param list<ChartAmount|ChartAmountShape>|null $chartAmount
     * @param list<ChartCount|ChartCountShape>|null $chartCount
     */
    public static function with(
        ?array $chartAmount = null,
        ?array $chartCount = null,
        ?float $delta = null,
        ?float $gross = null,
        ?float $total = null,
    ): self {
        $self = new self;

        null !== $chartAmount && $self['chartAmount'] = $chartAmount;
        null !== $chartCount && $self['chartCount'] = $chartCount;
        null !== $delta && $self['delta'] = $delta;
        null !== $gross && $self['gross'] = $gross;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<ChartAmount|ChartAmountShape> $chartAmount
     */
    public function withChartAmount(array $chartAmount): self
    {
        $self = clone $this;
        $self['chartAmount'] = $chartAmount;

        return $self;
    }

    /**
     * @param list<ChartCount|ChartCountShape> $chartCount
     */
    public function withChartCount(array $chartCount): self
    {
        $self = clone $this;
        $self['chartCount'] = $chartCount;

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
