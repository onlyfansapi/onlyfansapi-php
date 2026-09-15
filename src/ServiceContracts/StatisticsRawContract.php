<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Statistics\StatisticCalculateTotalTransactionsParams;
use OnlyFansAPI\Statistics\StatisticCalculateTotalTransactionsResponse;
use OnlyFansAPI\Statistics\StatisticGetOverviewParams;
use OnlyFansAPI\Statistics\StatisticGetOverviewResponse;
use OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsParams;
use OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
