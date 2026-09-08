<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams\Metric;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams\Model;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Generate revenue or churn forecasts using statistical models (Moving Average, Linear Regression, ARIMA, SARIMA).
 *
 * @see OnlyFansAPI\Services\Analytics\FinancialService::getForecast()
 *
 * @phpstan-type FinancialGetForecastParamsShape = array{
 *   accountIDs: list<string>,
 *   forecastDays: int,
 *   historicalDays: int,
 *   metric: Metric|value-of<Metric>,
 *   model: Model|value-of<Model>,
 * }
 */
final class FinancialGetForecastParams implements BaseModel
{
    /** @use SdkModel<FinancialGetForecastParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of account prefixed IDs.
     *
     * @var list<string> $accountIDs
     */
    #[Required('account_ids', list: 'string')]
    public array $accountIDs;

    /**
     * Number of days to forecast (7-365).
     */
    #[Required('forecast_days')]
    public int $forecastDays;

    /**
     * Number of historical days to analyze (30-730).
     */
    #[Required('historical_days')]
    public int $historicalDays;

    /**
     * The metric to forecast.
     *
     * @var value-of<Metric> $metric
     */
    #[Required(enum: Metric::class)]
    public string $metric;

    /**
     * The forecasting model to use.
     *
     * @var value-of<Model> $model
     */
    #[Required(enum: Model::class)]
    public string $model;

    /**
     * `new FinancialGetForecastParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FinancialGetForecastParams::with(
     *   accountIDs: ...,
     *   forecastDays: ...,
     *   historicalDays: ...,
     *   metric: ...,
     *   model: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FinancialGetForecastParams)
     *   ->withAccountIDs(...)
     *   ->withForecastDays(...)
     *   ->withHistoricalDays(...)
     *   ->withMetric(...)
     *   ->withModel(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $accountIDs
     * @param Metric|value-of<Metric> $metric
     * @param Model|value-of<Model> $model
     */
    public static function with(
        array $accountIDs,
        int $forecastDays,
        int $historicalDays,
        Metric|string $metric,
        Model|string $model,
    ): self {
        $self = new self;

        $self['accountIDs'] = $accountIDs;
        $self['forecastDays'] = $forecastDays;
        $self['historicalDays'] = $historicalDays;
        $self['metric'] = $metric;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Array of account prefixed IDs.
     *
     * @param list<string> $accountIDs
     */
    public function withAccountIDs(array $accountIDs): self
    {
        $self = clone $this;
        $self['accountIDs'] = $accountIDs;

        return $self;
    }

    /**
     * Number of days to forecast (7-365).
     */
    public function withForecastDays(int $forecastDays): self
    {
        $self = clone $this;
        $self['forecastDays'] = $forecastDays;

        return $self;
    }

    /**
     * Number of historical days to analyze (30-730).
     */
    public function withHistoricalDays(int $historicalDays): self
    {
        $self = clone $this;
        $self['historicalDays'] = $historicalDays;

        return $self;
    }

    /**
     * The metric to forecast.
     *
     * @param Metric|value-of<Metric> $metric
     */
    public function withMetric(Metric|string $metric): self
    {
        $self = clone $this;
        $self['metric'] = $metric;

        return $self;
    }

    /**
     * The forecasting model to use.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }
}
