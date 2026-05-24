<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonParams;

/**
 * Comparison granularity.
 */
enum Granularity: string
{
    case MONTHS = 'months';

    case QUARTERS = 'quarters';

    case HALF_YEARS = 'half_years';

    case YEARS = 'years';
}
