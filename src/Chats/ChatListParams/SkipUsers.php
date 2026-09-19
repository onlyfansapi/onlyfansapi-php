<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\ChatListParams;

/**
 * Whether to skip user details in the response (`all` or `none`). Defaults to `all`.
 */
enum SkipUsers: string
{
    case ALL = 'all';

    case NONE = 'none';
}
