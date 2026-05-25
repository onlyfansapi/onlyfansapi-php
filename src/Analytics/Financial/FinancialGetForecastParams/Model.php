<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial\FinancialGetForecastParams;

/**
 * The forecasting model to use.
 */
enum Model: string
{
    case MOVING_AVERAGE = 'moving_average';

    case LINEAR_REGRESSION = 'linear_regression';

    case ARIMA = 'arima';

    case SARIMA = 'sarima';
}
