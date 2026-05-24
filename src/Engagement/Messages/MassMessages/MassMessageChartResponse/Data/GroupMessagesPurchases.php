<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse\Data\GroupMessagesPurchases\Chart;

/**
 * @phpstan-import-type ChartShape from \Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse\Data\GroupMessagesPurchases\Chart
 *
 * @phpstan-type GroupMessagesPurchasesShape = array{
 *   chart?: list<Chart|ChartShape>|null, delta?: float|null, total?: int|null
 * }
 */
final class GroupMessagesPurchases implements BaseModel
{
    /** @use SdkModel<GroupMessagesPurchasesShape> */
    use SdkModel;

    /** @var list<Chart>|null $chart */
    #[Optional(list: Chart::class)]
    public ?array $chart;

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
     *
     * @param list<Chart|ChartShape>|null $chart
     */
    public static function with(
        ?array $chart = null,
        ?float $delta = null,
        ?int $total = null
    ): self {
        $self = new self;

        null !== $chart && $self['chart'] = $chart;
        null !== $delta && $self['delta'] = $delta;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<Chart|ChartShape> $chart
     */
    public function withChart(array $chart): self
    {
        $self = clone $this;
        $self['chart'] = $chart;

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
