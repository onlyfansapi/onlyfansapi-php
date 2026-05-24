<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessagesPurchases\Chart;

/**
 * @phpstan-import-type ChartShape from \Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessagesPurchases\Chart
 *
 * @phpstan-type DirectMessagesPurchasesShape = array{
 *   chart?: list<Chart|ChartShape>|null, delta?: float|null, total?: float|null
 * }
 */
final class DirectMessagesPurchases implements BaseModel
{
    /** @use SdkModel<DirectMessagesPurchasesShape> */
    use SdkModel;

    /** @var list<Chart>|null $chart */
    #[Optional(list: Chart::class)]
    public ?array $chart;

    #[Optional]
    public ?float $delta;

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
     * @param list<Chart|ChartShape>|null $chart
     */
    public static function with(
        ?array $chart = null,
        ?float $delta = null,
        ?float $total = null
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

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
