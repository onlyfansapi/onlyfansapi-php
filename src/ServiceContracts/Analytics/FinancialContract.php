<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Analytics;

use Onlyfansapi\Analytics\Financial\FinancialGetForecastParams\Metric;
use Onlyfansapi\Analytics\Financial\FinancialGetForecastParams\Model;
use Onlyfansapi\Analytics\Financial\FinancialGetForecastResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface FinancialContract
{
    /**
     * @api
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
    ): FinancialGetForecastResponse;
}
