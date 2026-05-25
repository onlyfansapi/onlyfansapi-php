<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get subscriber metrics including total, new, renewed, paid, and free subscriptions for a specified timeframe. `unknown_subscriptions` indicates deleted fan accounts.
 *
 * @see OnlyFansAPI\Services\StatisticsService::getSubscriberMetrics()
 *
 * @phpstan-type StatisticGetSubscriberMetricsParamsShape = array{
 *   endDate: string, startDate: string, detailed?: bool|null
 * }
 */
final class StatisticGetSubscriberMetricsParams implements BaseModel
{
    /** @use SdkModel<StatisticGetSubscriberMetricsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the metrics.
     */
    #[Required]
    public string $endDate;

    /**
     * The start date for the metrics.
     */
    #[Required]
    public string $startDate;

    /**
     * Include paid and free fan metrics. Will slow down the response time, and might time out if timeframe is too large. Default = `false`.
     */
    #[Optional(nullable: true)]
    public ?bool $detailed;

    /**
     * `new StatisticGetSubscriberMetricsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatisticGetSubscriberMetricsParams::with(endDate: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatisticGetSubscriberMetricsParams)->withEndDate(...)->withStartDate(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $endDate,
        string $startDate,
        ?bool $detailed = null
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        null !== $detailed && $self['detailed'] = $detailed;

        return $self;
    }

    /**
     * The end date for the metrics.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the metrics.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Include paid and free fan metrics. Will slow down the response time, and might time out if timeframe is too large. Default = `false`.
     */
    public function withDetailed(?bool $detailed): self
    {
        $self = clone $this;
        $self['detailed'] = $detailed;

        return $self;
    }
}
