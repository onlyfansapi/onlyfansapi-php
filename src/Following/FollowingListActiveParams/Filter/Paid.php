<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following\FollowingListActiveParams\Filter;

/**
 * Filter by paid status (1 for paid, 0 for free, null for all).
 */
enum Paid: int
{
    case _1 = 1;

    case _0 = 0;
}
