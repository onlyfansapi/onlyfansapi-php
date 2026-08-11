<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\FanListAllParams\Filter;

/**
 * Filter by online status (`1` for online fans). Must use bracket syntax: filter[online]=1 — the dot form (filter.online=1) is rejected with a 422, because PHP rewrites it to `filter_online` and the filter could not be applied.
 */
enum Online: int
{
    case _1 = 1;

    case _0 = 0;
}
