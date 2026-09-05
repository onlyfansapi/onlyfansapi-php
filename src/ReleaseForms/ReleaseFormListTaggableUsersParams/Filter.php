<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersParams;

/**
 * Filter users by type: `all` or `pending`.
 */
enum Filter: string
{
    case ALL = 'all';

    case PENDING = 'pending';
}
