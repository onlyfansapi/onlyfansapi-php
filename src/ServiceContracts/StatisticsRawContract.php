<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Statistics\StatisticCalculateTotalTransactionsParams;
use Onlyfansapi\Statistics\StatisticCalculateTotalTransactionsResponse;
use Onlyfansapi\Statistics\StatisticGetOverviewParams;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse;
use Onlyfansapi\Statistics\StatisticGetSubscriberMetricsParams;
use Onlyfansapi\Statistics\StatisticGetSubscriberMetricsResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface StatisticsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StatisticCalculateTotalTransactionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StatisticCalculateTotalTransactionsResponse>
     *
     * @throws APIException
     */
    public function calculateTotalTransactions(
        string $account,
        array|StatisticCalculateTotalTransactionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StatisticGetOverviewParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StatisticGetOverviewResponse>
     *
     * @throws APIException
     */
    public function getOverview(
        string $account,
        array|StatisticGetOverviewParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StatisticGetSubscriberMetricsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StatisticGetSubscriberMetricsResponse>
     *
     * @throws APIException
     */
    public function getSubscriberMetrics(
        string $account,
        array|StatisticGetSubscriberMetricsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
