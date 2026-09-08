<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Analytics;

use OnlyFansAPI\Analytics\Summary\SummaryGetEarningsOverviewParams;
use OnlyFansAPI\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceParams;
use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceParams\TimeRange;
use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceResponseItem;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\Granularity;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\StatType;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Conversion\ListOf;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Analytics\SummaryRawContract;

/**
 * APIs for retrieving summary analytics data.
 *
 * @phpstan-import-type PeriodAShape from \OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA
 * @phpstan-import-type PeriodBShape from \OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SummaryRawService implements SummaryRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get earnings overview by category for selected accounts within a date range. Returns total earnings, subscriptions, posts, messages, tips, streams, and content stats.
     *
     * @param array{
     *   accountIDs: list<string>, endDate: string, startDate: string
     * }|SummaryGetEarningsOverviewParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGetEarningsOverviewResponse>
     *
     * @throws APIException
     */
    public function getEarningsOverview(
        array|SummaryGetEarningsOverviewParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SummaryGetEarningsOverviewParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/analytics/summary/earnings',
            body: (object) $parsed,
            options: $options,
            convert: SummaryGetEarningsOverviewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get historical earnings chart data for the team. Returns monthly aggregated revenue data for the specified time range.
     *
     * @param array{
     *   timeRange?: TimeRange|value-of<TimeRange>
     * }|SummaryGetHistoricalPerformanceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<SummaryGetHistoricalPerformanceResponseItem>>
     *
     * @throws APIException
     */
    public function getHistoricalPerformance(
        array|SummaryGetHistoricalPerformanceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SummaryGetHistoricalPerformanceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/analytics/summary/historical',
            body: (object) $parsed,
            options: $options,
            convert: new ListOf(SummaryGetHistoricalPerformanceResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Compare two time periods to analyze performance changes. Returns summary, breakdown, and chart data for the comparison.
     *
     * @param array{
     *   accountIDs: list<string>,
     *   periodA: PeriodA|PeriodAShape,
     *   periodB: PeriodB|PeriodBShape,
     *   granularity?: Granularity|value-of<Granularity>,
     *   statType?: StatType|value-of<StatType>,
     * }|SummaryGetPeriodComparisonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGetPeriodComparisonResponse>
     *
     * @throws APIException
     */
    public function getPeriodComparison(
        array|SummaryGetPeriodComparisonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SummaryGetPeriodComparisonParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/analytics/summary/comparison',
            body: (object) $parsed,
            options: $options,
            convert: SummaryGetPeriodComparisonResponse::class,
        );
    }
}
