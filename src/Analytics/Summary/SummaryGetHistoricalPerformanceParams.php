<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Summary;

use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceParams\TimeRange;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get historical earnings chart data for the team. Returns monthly aggregated revenue data for the specified time range.
 *
 * @see OnlyFansAPI\Services\Analytics\SummaryService::getHistoricalPerformance()
 *
 * @phpstan-type SummaryGetHistoricalPerformanceParamsShape = array{
 *   timeRange?: null|TimeRange|value-of<TimeRange>
 * }
 */
final class SummaryGetHistoricalPerformanceParams implements BaseModel
{
    /** @use SdkModel<SummaryGetHistoricalPerformanceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The time range for historical data.
     *
     * @var value-of<TimeRange>|null $timeRange
     */
    #[Optional('time_range', enum: TimeRange::class)]
    public ?string $timeRange;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TimeRange|value-of<TimeRange>|null $timeRange
     */
    public static function with(TimeRange|string|null $timeRange = null): self
    {
        $self = new self;

        null !== $timeRange && $self['timeRange'] = $timeRange;

        return $self;
    }

    /**
     * The time range for historical data.
     *
     * @param TimeRange|value-of<TimeRange> $timeRange
     */
    public function withTimeRange(TimeRange|string $timeRange): self
    {
        $self = clone $this;
        $self['timeRange'] = $timeRange;

        return $self;
    }
}
