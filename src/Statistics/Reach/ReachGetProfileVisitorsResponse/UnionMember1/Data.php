<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Chart;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Total;

/**
 * @phpstan-import-type ChartShape from \OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Chart
 * @phpstan-import-type TotalShape from \OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data\Total
 *
 * @phpstan-type DataShape = array{
 *   chart?: null|Chart|ChartShape,
 *   hasStats?: bool|null,
 *   isAvailable?: bool|null,
 *   total?: null|Total|TotalShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Chart $chart;

    #[Optional]
    public ?bool $hasStats;

    #[Optional]
    public ?bool $isAvailable;

    #[Optional]
    public ?Total $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Chart|ChartShape|null $chart
     * @param Total|TotalShape|null $total
     */
    public static function with(
        Chart|array|null $chart = null,
        ?bool $hasStats = null,
        ?bool $isAvailable = null,
        Total|array|null $total = null,
    ): self {
        $self = new self;

        null !== $chart && $self['chart'] = $chart;
        null !== $hasStats && $self['hasStats'] = $hasStats;
        null !== $isAvailable && $self['isAvailable'] = $isAvailable;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param Chart|ChartShape $chart
     */
    public function withChart(Chart|array $chart): self
    {
        $self = clone $this;
        $self['chart'] = $chart;

        return $self;
    }

    public function withHasStats(bool $hasStats): self
    {
        $self = clone $this;
        $self['hasStats'] = $hasStats;

        return $self;
    }

    public function withIsAvailable(bool $isAvailable): self
    {
        $self = clone $this;
        $self['isAvailable'] = $isAvailable;

        return $self;
    }

    /**
     * @param Total|TotalShape $total
     */
    public function withTotal(Total|array $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
