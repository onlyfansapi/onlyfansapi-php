<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\FinancialGetForecastResponse\Forecast;
use OnlyFansAPI\Analytics\Financial\FinancialGetForecastResponse\Historical;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ForecastShape from \OnlyFansAPI\Analytics\Financial\FinancialGetForecastResponse\Forecast
 * @phpstan-import-type HistoricalShape from \OnlyFansAPI\Analytics\Financial\FinancialGetForecastResponse\Historical
 *
 * @phpstan-type FinancialGetForecastResponseShape = array{
 *   forecast?: list<Forecast|ForecastShape>|null,
 *   historical?: list<Historical|HistoricalShape>|null,
 *   metric?: string|null,
 *   model?: string|null,
 * }
 */
final class FinancialGetForecastResponse implements BaseModel
{
    /** @use SdkModel<FinancialGetForecastResponseShape> */
    use SdkModel;

    /** @var list<Forecast>|null $forecast */
    #[Optional(list: Forecast::class)]
    public ?array $forecast;

    /** @var list<Historical>|null $historical */
    #[Optional(list: Historical::class)]
    public ?array $historical;

    #[Optional]
    public ?string $metric;

    #[Optional]
    public ?string $model;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Forecast|ForecastShape>|null $forecast
     * @param list<Historical|HistoricalShape>|null $historical
     */
    public static function with(
        ?array $forecast = null,
        ?array $historical = null,
        ?string $metric = null,
        ?string $model = null,
    ): self {
        $self = new self;

        null !== $forecast && $self['forecast'] = $forecast;
        null !== $historical && $self['historical'] = $historical;
        null !== $metric && $self['metric'] = $metric;
        null !== $model && $self['model'] = $model;

        return $self;
    }

    /**
     * @param list<Forecast|ForecastShape> $forecast
     */
    public function withForecast(array $forecast): self
    {
        $self = clone $this;
        $self['forecast'] = $forecast;

        return $self;
    }

    /**
     * @param list<Historical|HistoricalShape> $historical
     */
    public function withHistorical(array $historical): self
    {
        $self = clone $this;
        $self['historical'] = $historical;

        return $self;
    }

    public function withMetric(string $metric): self
    {
        $self = clone $this;
        $self['metric'] = $metric;

        return $self;
    }

    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }
}
