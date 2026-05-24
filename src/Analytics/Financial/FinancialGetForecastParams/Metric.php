<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Financial\FinancialGetForecastParams;

/**
 * The metric to forecast.
 */
enum Metric: string
{
    case REVENUE = 'revenue';

    case CHURN_PERCENTAGE = 'churn_percentage';
}
