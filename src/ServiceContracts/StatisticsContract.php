<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Statistics\StatisticCalculateTotalTransactionsResponse;
use Onlyfansapi\Statistics\StatisticGetOverviewParams\Type;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse;
use Onlyfansapi\Statistics\StatisticGetSubscriberMetricsResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
        string $endDate,
        string $startDate,
        RequestOptions|array|null $requestOptions = null,
    ): StatisticCalculateTotalTransactionsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate the end date for the statistics
     * @param string $startDate the start date for the statistics
     * @param Type|value-of<Type>|null $type The type of statistics to retrieve (default = empty)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getOverview(
        string $account,
        string $endDate,
        string $startDate,
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
