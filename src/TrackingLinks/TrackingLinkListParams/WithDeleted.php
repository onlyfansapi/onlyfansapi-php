<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\TrackingLinkListParams;

/**
 * Whether to include deleted tracking links. Default `true`.
 */
enum WithDeleted: int
{
    case _0 = 0;

    case _1 = 1;
}
