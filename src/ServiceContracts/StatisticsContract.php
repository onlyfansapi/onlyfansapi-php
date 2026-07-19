<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Statistics\StatisticCalculateTotalTransactionsResponse;
use OnlyFansAPI\Statistics\StatisticGetOverviewParams\Type;
use OnlyFansAPI\Statistics\StatisticGetOverviewResponse;
use OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface StatisticsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The end date for the period. Keep empty to calculate everything.
     * @param string $startDate The start date for the period. Keep empty to calculate everything.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function calculateTotalTransactions(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): StatisticCalculateTotalTransactionsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The end date for the statistics. Keep empty to retrieve until now.
     * @param string $startDate The start date for the statistics. Keep empty to retrieve from the model's start date.
     * @param Type|value-of<Type>|null $type The type of statistics to retrieve (default = empty)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getOverview(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): StatisticGetOverviewResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate the end date for the metrics
     * @param string $startDate the start date for the metrics
     * @param bool|null $detailed Include paid and free fan metrics. Will slow down the response time, and might time out if timeframe is too large. Default = `false`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriberMetrics(
        string $account,
        string $endDate,
        string $startDate,
        ?bool $detailed = null,
        RequestOptions|array|null $requestOptions = null,
    ): StatisticGetSubscriberMetricsResponse;
}
