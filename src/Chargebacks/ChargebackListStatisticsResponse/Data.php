<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chargebacks\ChargebackListStatisticsResponse;

use OnlyFansAPI\Chargebacks\ChargebackListStatisticsResponse\Data\ChartAmount;
use OnlyFansAPI\Chargebacks\ChargebackListStatisticsResponse\Data\ChartCount;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ChartAmountShape from \OnlyFansAPI\Chargebacks\ChargebackListStatisticsResponse\Data\ChartAmount
 * @phpstan-import-type ChartCountShape from \OnlyFansAPI\Chargebacks\ChargebackListStatisticsResponse\Data\ChartCount
 *
 * @phpstan-type DataShape = array{
 *   chartAmount?: list<ChartAmount|ChartAmountShape>|null,
 *   chartCount?: list<ChartCount|ChartCountShape>|null,
 *   delta?: int|null,
 *   total?: float|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<ChartAmount>|null $chartAmount */
    #[Optional(list: ChartAmount::class)]
    public ?array $chartAmount;

    /** @var list<ChartCount>|null $chartCount */
    #[Optional(list: ChartCount::class)]
    public ?array $chartCount;

    #[Optional]
    public ?int $delta;

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
        ?int $delta = null,
        ?float $total = null,
    ): self {
        $self = new self;

        null !== $chartAmount && $self['chartAmount'] = $chartAmount;
        null !== $chartCount && $self['chartCount'] = $chartCount;
        null !== $delta && $self['delta'] = $delta;
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

    public function withDelta(int $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
