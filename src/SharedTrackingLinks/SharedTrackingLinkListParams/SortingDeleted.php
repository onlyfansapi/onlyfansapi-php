<?php

declare(strict_types=1);

namespace OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams;

/**
 * Whether deleted links participate in sorting. Default `1`.
 */
enum SortingDeleted: int
{
    case _0 = 0;

    case _1 = 1;
}
