<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse\Data\DailyMetric;
use Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse\Data\MonthlyMetric;
use Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse\Data\Summary;

/**
 * @phpstan-import-type DailyMetricShape from \Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse\Data\DailyMetric
 * @phpstan-import-type MonthlyMetricShape from \Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse\Data\MonthlyMetric
 * @phpstan-import-type SummaryShape from \Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse\Data\Summary
 *
 * @phpstan-type DataShape = array{
 *   dailyMetrics?: list<DailyMetric|DailyMetricShape>|null,
 *   monthlyMetrics?: list<MonthlyMetric|MonthlyMetricShape>|null,
 *   summary?: null|Summary|SummaryShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<DailyMetric>|null $dailyMetrics */
    #[Optional('daily_metrics', list: DailyMetric::class)]
    public ?array $dailyMetrics;

    /** @var list<MonthlyMetric>|null $monthlyMetrics */
    #[Optional('monthly_metrics', list: MonthlyMetric::class)]
    public ?array $monthlyMetrics;

    #[Optional]
    public ?Summary $summary;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DailyMetric|DailyMetricShape>|null $dailyMetrics
     * @param list<MonthlyMetric|MonthlyMetricShape>|null $monthlyMetrics
     * @param Summary|SummaryShape|null $summary
     */
    public static function with(
        ?array $dailyMetrics = null,
        ?array $monthlyMetrics = null,
        Summary|array|null $summary = null,
    ): self {
        $self = new self;

        null !== $dailyMetrics && $self['dailyMetrics'] = $dailyMetrics;
        null !== $monthlyMetrics && $self['monthlyMetrics'] = $monthlyMetrics;
        null !== $summary && $self['summary'] = $summary;

        return $self;
    }

    /**
     * @param list<DailyMetric|DailyMetricShape> $dailyMetrics
     */
    public function withDailyMetrics(array $dailyMetrics): self
    {
        $self = clone $this;
        $self['dailyMetrics'] = $dailyMetrics;

        return $self;
    }

    /**
     * @param list<MonthlyMetric|MonthlyMetricShape> $monthlyMetrics
     */
    public function withMonthlyMetrics(array $monthlyMetrics): self
    {
        $self = clone $this;
        $self['monthlyMetrics'] = $monthlyMetrics;

        return $self;
    }

    /**
     * @param Summary|SummaryShape $summary
     */
    public function withSummary(Summary|array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }
}
