<?php

declare(strict_types=1);

namespace OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams;

/**
 * Whether to include deleted shared tracking links. Default `1`.
 */
enum WithDeleted: int
{
    case _0 = 0;

    case _1 = 1;
}
