<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Analytics;

use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams\Metric;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams\Model;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Analytics\FinancialContract;
use OnlyFansAPI\Services\Analytics\Financial\ProfitabilityService;
use OnlyFansAPI\Services\Analytics\Financial\TransactionsService;

/**
 * APIs for retrieving financial analytics data.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class FinancialService implements FinancialContract
{
    /**
     * @api
     */
    public FinancialRawService $raw;

    /**
     * @api
     */
    public TransactionsService $transactions;

    /**
     * @api
     */
    public ProfitabilityService $profitability;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FinancialRawService($client);
        $this->transactions = new TransactionsService($client);
        $this->profitability = new ProfitabilityService($client);
    }

    /**
     * @api
     *
     * Generate revenue or churn forecasts using statistical models (Moving Average, Linear Regression, ARIMA, SARIMA).
     *
     * @param list<string> $accountIDs Array of account prefixed IDs
     * @param int $forecastDays Number of days to forecast (7-365)
     * @param int $historicalDays Number of historical days to analyze (30-730)
     * @param Metric|value-of<Metric> $metric The metric to forecast
     * @param Model|value-of<Model> $model The forecasting model to use
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getForecast(
        array $accountIDs,
        int $forecastDays,
        int $historicalDays,
        Metric|string $metric,
        Model|string $model,
        RequestOptions|array|null $requestOptions = null,
    ): FinancialGetForecastResponse {
        $params = Util::removeNulls(
            [
                'accountIDs' => $accountIDs,
                'forecastDays' => $forecastDays,
                'historicalDays' => $historicalDays,
                'metric' => $metric,
                'model' => $model,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getForecast(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
