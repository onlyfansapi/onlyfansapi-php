<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\ChatListParams;

/**
 * Optionally, filter the chats by type.
 */
enum Filter: string
{
    case PINNED = 'pinned';

    case PRIORITY = 'priority';

    case UNREAD = 'unread';

    case WITH_TIPS = 'with_tips';

    case UNREAD_WITH_TIPS = 'unread_with_tips';
}
