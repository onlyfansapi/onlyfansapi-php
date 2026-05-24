<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Analytics;

use Onlyfansapi\Analytics\Summary\SummaryGetEarningsOverviewParams;
use Onlyfansapi\Analytics\Summary\SummaryGetEarningsOverviewResponse;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceParams;
use Onlyfansapi\Analytics\Summary\SummaryGetHistoricalPerformanceResponseItem;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams;
use Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
