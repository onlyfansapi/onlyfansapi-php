<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Analytics;

use OnlyFansAPI\Analytics\Summary\SummaryGetEarningsOverviewParams;
use OnlyFansAPI\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceParams;
use OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceResponseItem;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonParams;
use OnlyFansAPI\Analytics\Summary\SummaryGetPeriodComparisonResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SummaryRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SummaryGetEarningsOverviewParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGetEarningsOverviewResponse>
     *
     * @throws APIException
     */
    public function getEarningsOverview(
        array|SummaryGetEarningsOverviewParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SummaryGetHistoricalPerformanceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<SummaryGetHistoricalPerformanceResponseItem>>
     *
     * @throws APIException
     */
    public function getHistoricalPerformance(
        array|SummaryGetHistoricalPerformanceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SummaryGetPeriodComparisonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGetPeriodComparisonResponse>
     *
     * @throws APIException
     */
    public function getPeriodComparison(
        array|SummaryGetPeriodComparisonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
