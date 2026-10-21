<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\UserListListParams;

/**
 * How to return the results. `queue` returns the user lists that are available for Mass-Messaging.
 */
enum View: string
{
    case QUEUE = 'queue';
}
