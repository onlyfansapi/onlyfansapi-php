<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams;

/**
 * Optionally, filter the results by `chart` or `topCountries`. See example responses.
 */
enum Filter: string
{
    case CHART = 'chart';

    case TOP_COUNTRIES = 'topCountries';
}
