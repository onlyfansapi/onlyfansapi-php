<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following\FollowingListExpiredParams;

/**
 * Direction for `sort`: `desc` (default) or `asc`. Requires `sort` to be set.
 */
enum SortDirection: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
