<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Analytics;

use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams\Metric;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams\Model;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Analytics\FinancialRawContract;

/**
 * APIs for retrieving financial analytics data.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class FinancialRawService implements FinancialRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate revenue or churn forecasts using statistical models (Moving Average, Linear Regression, ARIMA, SARIMA).
     *
     * @param array{
     *   accountIDs: list<string>,
     *   forecastDays: int,
     *   historicalDays: int,
     *   metric: Metric|value-of<Metric>,
     *   model: Model|value-of<Model>,
     * }|FinancialGetForecastParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FinancialGetForecastResponse>
     *
     * @throws APIException
     */
    public function getForecast(
        array|FinancialGetForecastParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FinancialGetForecastParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/analytics/financial/forecast',
            body: (object) $parsed,
            options: $options,
            convert: FinancialGetForecastResponse::class,
        );
    }
}
