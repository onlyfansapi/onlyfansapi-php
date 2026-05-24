<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Analytics;

use Onlyfansapi\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceParams\TimeRange;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceResponseItem;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\Granularity;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\StatType;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type PeriodAShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA
 * @phpstan-import-type PeriodBShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SummaryContract
{
    /**
     * @api
     *
     * @param list<string> $accountIDs Array of account prefixed IDs to get earnings for
     * @param string $endDate The end date (ISO 8601 format)
     * @param string $startDate The start date (ISO 8601 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarningsOverview(
        array $accountIDs,
        string $endDate,
        string $startDate,
        RequestOptions|array|null $requestOptions = null,
    ): SummaryGetEarningsOverviewResponse;

    /**
     * @api
     *
     * @param TimeRange|value-of<TimeRange> $timeRange The time range for historical data
     * @param RequestOpts|null $requestOptions
     *
     * @return list<SummaryGetHistoricalPerformanceResponseItem>
     *
     * @throws APIException
     */
    public function getHistoricalPerformance(
        TimeRange|string|null $timeRange = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param list<string> $accountIDs Array of account prefixed IDs to compare
     * @param PeriodA|PeriodAShape $periodA First period to compare
     * @param PeriodB|PeriodBShape $periodB Second period to compare
     * @param Granularity|value-of<Granularity> $granularity Comparison granularity
     * @param StatType|value-of<StatType> $statType The statistic type to compare
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPeriodComparison(
        array $accountIDs,
        PeriodA|array $periodA,
        PeriodB|array $periodB,
        Granularity|string|null $granularity = null,
        StatType|string|null $statType = null,
        RequestOptions|array|null $requestOptions = null,
    ): SummaryGetPeriodComparisonResponse;
}
