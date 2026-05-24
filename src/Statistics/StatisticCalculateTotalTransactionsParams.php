<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Calculate the total transactions and amounts.
 *
 * @see Onlyfansapi\Services\StatisticsService::calculateTotalTransactions()
 *
 * @phpstan-type StatisticCalculateTotalTransactionsParamsShape = array{
 *   endDate: string, startDate: string
 * }
 */
final class StatisticCalculateTotalTransactionsParams implements BaseModel
{
    /** @use SdkModel<StatisticCalculateTotalTransactionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the period. Keep empty to calculate everything.
     */
    #[Required]
    public string $endDate;

    /**
     * The start date for the period. Keep empty to calculate everything.
     */
    #[Required]
    public string $startDate;

    /**
     * `new StatisticCalculateTotalTransactionsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatisticCalculateTotalTransactionsParams::with(endDate: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatisticCalculateTotalTransactionsParams)
     *   ->withEndDate(...)
     *   ->withStartDate(...)
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
    public static function with(string $endDate, string $startDate): self
    {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The end date for the period. Keep empty to calculate everything.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the period. Keep empty to calculate everything.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
