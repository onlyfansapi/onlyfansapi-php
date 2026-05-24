<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Analytics;

use Onlyfansapi\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceParams\TimeRange;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceResponseItem;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\Granularity;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\StatType;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Analytics\SummaryContract;

/**
 * APIs for retrieving summary analytics data.
 *
 * @phpstan-import-type PeriodAShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA
 * @phpstan-import-type PeriodBShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SummaryService implements SummaryContract
{
    /**
     * @api
     */
    public SummaryRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SummaryRawService($client);
    }

    /**
     * @api
     *
     * Get earnings overview by category for selected accounts within a date range. Returns total earnings, subscriptions, posts, messages, tips, streams, and content stats.
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
    ): SummaryGetEarningsOverviewResponse {
        $params = Util::removeNulls(
            [
                'accountIDs' => $accountIDs,
                'endDate' => $endDate,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarningsOverview(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get historical earnings chart data for the team. Returns monthly aggregated revenue data for the specified time range.
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
    ): array {
        $params = Util::removeNulls(['timeRange' => $timeRange]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getHistoricalPerformance(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Compare two time periods to analyze performance changes. Returns summary, breakdown, and chart data for the comparison.
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
    ): SummaryGetPeriodComparisonResponse {
        $params = Util::removeNulls(
            [
                'accountIDs' => $accountIDs,
                'periodA' => $periodA,
                'periodB' => $periodB,
                'granularity' => $granularity,
                'statType' => $statType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPeriodComparison(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
