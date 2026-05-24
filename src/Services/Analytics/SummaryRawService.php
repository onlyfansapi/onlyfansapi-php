<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Analytics;

use Onlyfansapi\Analytics\Summary\SummaryGetEarningsOverviewParams;
use Onlyfansapi\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceParams;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceParams\TimeRange;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceResponseItem;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\Granularity;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\StatType;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Conversion\ListOf;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Analytics\SummaryRawContract;

/**
 * APIs for retrieving summary analytics data.
 *
 * @phpstan-import-type PeriodAShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodA
 * @phpstan-import-type PeriodBShape from \Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams\PeriodB
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
