<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Analytics;

use OnlyFansAPI\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceParams\TimeRange;
use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceResponseItem;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\Granularity;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\StatType;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type PeriodAShape from \OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA
 * @phpstan-import-type PeriodBShape from \OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
