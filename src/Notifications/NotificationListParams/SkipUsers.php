<?php

declare(strict_types=1);

namespace Onlyfansapi\Notifications\NotificationListParams;

/**
 * Whether to skip user details. Default `all`.
 */
enum SkipUsers: string
{
    case ALL = 'all';

    case NONE = 'none';
}
