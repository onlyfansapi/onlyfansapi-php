<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following\FollowingListActiveParams\Filter;

/**
 * Filter by online status (1 for online, 0 for offline, null for all).
 */
enum Online: int
{
    case _1 = 1;

    case _0 = 0;
}
