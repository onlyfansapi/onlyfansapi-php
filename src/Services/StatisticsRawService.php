<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\StatisticsRawContract;
use Onlyfansapi\Statistics\StatisticCalculateTotalTransactionsParams;
use Onlyfansapi\Statistics\StatisticCalculateTotalTransactionsResponse;
use Onlyfansapi\Statistics\StatisticGetOverviewParams;
use Onlyfansapi\Statistics\StatisticGetOverviewParams\Type;
use Onlyfansapi\Statistics\StatisticGetOverviewResponse;
use Onlyfansapi\Statistics\StatisticGetSubscriberMetricsParams;
use Onlyfansapi\Statistics\StatisticGetSubscriberMetricsResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class StatisticsRawService implements StatisticsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Calculate the total transactions and amounts.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate: string, startDate: string
     * }|StatisticCalculateTotalTransactionsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = StatisticCalculateTotalTransactionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/statistics/total-transactions', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: StatisticCalculateTotalTransactionsResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an overview of statistics for fans, visitors, posts, or general.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate: string, startDate: string, type?: Type|value-of<Type>|null
     * }|StatisticGetOverviewParams $params
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
    ): BaseResponse {
        [$parsed, $options] = StatisticGetOverviewParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/statistics/overview', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: StatisticGetOverviewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get subscriber metrics including total, new, renewed, paid, and free subscriptions for a specified timeframe. `unknown_subscriptions` indicates deleted fan accounts.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate: string, startDate: string, detailed?: bool|null
     * }|StatisticGetSubscriberMetricsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = StatisticGetSubscriberMetricsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/statistics/subscriber-metrics', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: StatisticGetSubscriberMetricsResponse::class,
        );
    }
}
