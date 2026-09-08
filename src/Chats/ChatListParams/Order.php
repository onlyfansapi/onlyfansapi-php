<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\ChatListParams;

/**
 * Sort order for chats (recent or old). Default = recent.
 */
enum Order: string
{
    case RECENT = 'recent';

    case OLD = 'old';
}
