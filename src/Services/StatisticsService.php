<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\StatisticsContract;
use OnlyFansAPI\Services\Statistics\ReachService;
use OnlyFansAPI\Services\Statistics\StatementsService;
use OnlyFansAPI\Statistics\StatisticCalculateTotalTransactionsResponse;
use OnlyFansAPI\Statistics\StatisticGetOverviewParams\Type;
use OnlyFansAPI\Statistics\StatisticGetOverviewResponse;
use OnlyFansAPI\Statistics\StatisticGetSubscriberMetricsResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class StatisticsService implements StatisticsContract
{
    /**
     * @api
     */
    public StatisticsRawService $raw;

    /**
     * @api
     */
    public StatementsService $statements;

    /**
     * @api
     */
    public ReachService $reach;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StatisticsRawService($client);
        $this->statements = new StatementsService($client);
        $this->reach = new ReachService($client);
    }

    /**
     * @api
     *
     * Calculate the total transactions and amounts.
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
    ): StatisticCalculateTotalTransactionsResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->calculateTotalTransactions($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an overview of statistics for fans, visitors, posts, or general.
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
    ): StatisticGetOverviewResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate, 'type' => $type]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getOverview($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get subscriber metrics including total, new, renewed, paid, and free subscriptions for a specified timeframe. `unknown_subscriptions` indicates deleted fan accounts.
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
    ): StatisticGetSubscriberMetricsResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'startDate' => $startDate,
                'detailed' => $detailed,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscriberMetrics($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
