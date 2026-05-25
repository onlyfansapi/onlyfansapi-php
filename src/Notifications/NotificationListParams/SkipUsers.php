<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\NotificationListParams;

/**
 * Whether to skip user details. Default `all`.
 */
enum SkipUsers: string
{
    case ALL = 'all';

    case NONE = 'none';
}
