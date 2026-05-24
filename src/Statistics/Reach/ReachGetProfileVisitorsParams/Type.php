<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsParams;

/**
 * Filter all / users / guests.
 */
enum Type: string
{
    case TOTAL = 'total';

    case USERS = 'users';

    case GUESTS = 'guests';
}
