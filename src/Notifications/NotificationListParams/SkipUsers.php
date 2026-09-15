<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\NotificationListParams;

/**
 * Whether to skip user details. Defaults to `all`.
 */
enum SkipUsers: string
{
    case ALL = 'all';

    case NONE = 'none';
}
