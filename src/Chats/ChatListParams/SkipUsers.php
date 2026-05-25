<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\ChatListParams;

/**
 * Whether to skip user details in response (all or none). Default = all.
 */
enum SkipUsers: string
{
    case ALL = 'all';

    case NONE = 'none';
}
