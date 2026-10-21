<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following\FollowingListAllParams;

/**
 * Direction for `sort`: `desc` (default) or `asc`. Requires `sort` to be set. Exception: `sort=expire_date` on the expired list defaults to `asc`, because `desc` moves the expired rows to the tail of the underlying collection and leaves the early pages empty. Passing `sortDirection` explicitly always wins.
 */
enum SortDirection: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
