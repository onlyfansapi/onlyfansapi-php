<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\ChartData;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\Earnings;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\Subscriptions;

/**
 * @phpstan-import-type ChartDataShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\ChartData
 * @phpstan-import-type EarningsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\Earnings
 * @phpstan-import-type SubscriptionsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\Subscriptions
 * @phpstan-import-type VisitorsShape from \Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\Visitors as VisitorsShape1
 *
 * @phpstan-type VisitorsShape = array{
 *   chartData?: list<ChartData|ChartDataShape>|null,
 *   earnings?: null|Earnings|EarningsShape,
 *   hasStatistic?: bool|null,
 *   subscriptions?: null|Subscriptions|SubscriptionsShape,
 *   visitors?: null|\Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\Visitors|VisitorsShape1,
 * }
 */
final class Visitors implements BaseModel
{
    /** @use SdkModel<VisitorsShape> */
    use SdkModel;

    /** @var list<ChartData>|null $chartData */
    #[Optional(list: ChartData::class)]
    public ?array $chartData;

    #[Optional]
    public ?Earnings $earnings;

    #[Optional]
    public ?bool $hasStatistic;

    #[Optional]
    public ?Subscriptions $subscriptions;

    #[Optional]
    public ?Visitors\Visitors $visitors;

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
     * @param Earnings|EarningsShape|null $earnings
     * @param Subscriptions|SubscriptionsShape|null $subscriptions
     * @param Visitors\Visitors|VisitorsShape1|null $visitors
     */
    public static function with(
        ?array $chartData = null,
        Earnings|array|null $earnings = null,
        ?bool $hasStatistic = null,
        Subscriptions|array|null $subscriptions = null,
        Visitors\Visitors|array|null $visitors = null,
    ): self {
        $self = new self;

        null !== $chartData && $self['chartData'] = $chartData;
        null !== $earnings && $self['earnings'] = $earnings;
        null !== $hasStatistic && $self['hasStatistic'] = $hasStatistic;
        null !== $subscriptions && $self['subscriptions'] = $subscriptions;
        null !== $visitors && $self['visitors'] = $visitors;

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
     * @param Subscriptions|SubscriptionsShape $subscriptions
     */
    public function withSubscriptions(Subscriptions|array $subscriptions): self
    {
        $self = clone $this;
        $self['subscriptions'] = $subscriptions;

        return $self;
    }

    /**
     * @param Visitors\Visitors|VisitorsShape1 $visitors
     */
    public function withVisitors(
        Visitors\Visitors|array $visitors,
    ): self {
        $self = clone $this;
        $self['visitors'] = $visitors;

        return $self;
    }
}
