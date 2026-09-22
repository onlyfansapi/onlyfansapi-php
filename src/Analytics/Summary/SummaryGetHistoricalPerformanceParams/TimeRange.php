<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Summary\SummaryGetHistoricalPerformanceParams;

/**
 * The time range for historical data.
 */
enum TimeRange: string
{
    case _3M = '3m';

    case _6M = '6m';

    case _12M = '12m';

    case YTD = 'ytd';

    case LAST_YEAR = 'last-year';
}
