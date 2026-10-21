<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\StatisticsRawContract;
use OnlyFansAPI\Statistics\StatisticCalculateTotalTransactionsParams;
use OnlyFansAPI\Statistics\StatisticCalculateTotalTransactionsResponse;
use OnlyFansAPI\Statistics\StatisticGetOverviewParams;
use OnlyFansAPI\Statistics\StatisticGetOverviewParams\Type;
use OnlyFansAPI\Statistics\StatisticGetOverviewResponse;
use OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsParams;
use OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsParams\DetailedType;
use OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     *   endDate?: string, startDate?: string
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
     *   endDate?: string, startDate?: string, type?: Type|value-of<Type>|null
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
     *   endDate: string,
     *   startDate: string,
     *   detailed?: bool|null,
     *   detailedType?: DetailedType|value-of<DetailedType>|null,
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
                [
                    'endDate' => 'end_date',
                    'startDate' => 'start_date',
                    'detailedType' => 'detailed_type',
                ],
            ),
            options: $options,
            convert: StatisticGetSubscriberMetricsResponse::class,
        );
    }
}
