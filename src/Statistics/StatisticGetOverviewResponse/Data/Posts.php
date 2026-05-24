<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\ChartData;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\Count;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\Earnings;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\Views;

/**
 * @phpstan-import-type ChartDataShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\ChartData
 * @phpstan-import-type CountShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\Count
 * @phpstan-import-type EarningsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\Earnings
 * @phpstan-import-type ViewsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Posts\Views
 *
 * @phpstan-type PostsShape = array{
 *   chartData?: list<ChartData|ChartDataShape>|null,
 *   count?: null|Count|CountShape,
 *   earnings?: null|Earnings|EarningsShape,
 *   hasStatistic?: bool|null,
 *   views?: null|Views|ViewsShape,
 * }
 */
final class Posts implements BaseModel
{
    /** @use SdkModel<PostsShape> */
    use SdkModel;

    /** @var list<ChartData>|null $chartData */
    #[Optional(list: ChartData::class)]
    public ?array $chartData;

    #[Optional]
    public ?Count $count;

    #[Optional]
    public ?Earnings $earnings;

    #[Optional]
    public ?bool $hasStatistic;

    #[Optional]
    public ?Views $views;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ChartData|ChartDataShape>|null $chartData
     * @param Count|CountShape|null $count
     * @param Earnings|EarningsShape|null $earnings
     * @param Views|ViewsShape|null $views
     */
    public static function with(
        ?array $chartData = null,
        Count|array|null $count = null,
        Earnings|array|null $earnings = null,
        ?bool $hasStatistic = null,
        Views|array|null $views = null,
    ): self {
        $self = new self;

        null !== $chartData && $self['chartData'] = $chartData;
        null !== $count && $self['count'] = $count;
        null !== $earnings && $self['earnings'] = $earnings;
        null !== $hasStatistic && $self['hasStatistic'] = $hasStatistic;
        null !== $views && $self['views'] = $views;

        return $self;
    }

    /**
     * @param list<ChartData|ChartDataShape> $chartData
     */
    public function withChartData(array $chartData): self
    {
        $self = clone $this;
        $self['chartData'] = $chartData;

        return $self;
    }

    /**
     * @param Count|CountShape $count
     */
    public function withCount(Count|array $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * @param Earnings|EarningsShape $earnings
     */
    public function withEarnings(Earnings|array $earnings): self
    {
        $self = clone $this;
        $self['earnings'] = $earnings;

        return $self;
    }

    public function withHasStatistic(bool $hasStatistic): self
    {
        $self = clone $this;
        $self['hasStatistic'] = $hasStatistic;

        return $self;
    }

    /**
     * @param Views|ViewsShape $views
     */
    public function withViews(Views|array $views): self
    {
        $self = clone $this;
        $self['views'] = $views;

        return $self;
    }
}
