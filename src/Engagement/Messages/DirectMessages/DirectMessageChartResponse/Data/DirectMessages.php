<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessages\Chart;

/**
 * @phpstan-import-type ChartShape from \Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse\Data\DirectMessages\Chart
 *
 * @phpstan-type DirectMessagesShape = array{
 *   chart?: list<Chart|ChartShape>|null, delta?: int|null, total?: int|null
 * }
 */
final class DirectMessages implements BaseModel
{
    /** @use SdkModel<DirectMessagesShape> */
    use SdkModel;

    /** @var list<Chart>|null $chart */
    #[Optional(list: Chart::class)]
    public ?array $chart;

    #[Optional]
    public ?int $delta;

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
        ?int $delta = null,
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

    public function withDelta(int $delta): self
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
