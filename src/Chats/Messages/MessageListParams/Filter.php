<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\Messages\MessageListParams;

/**
 * Filter by certain messages. Currently, only pins are filterable.
 */
enum Filter: string
{
    case PINNED = 'pinned';
}
