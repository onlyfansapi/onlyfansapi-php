<?php

declare(strict_types=1);

namespace Onlyfansapi\MassMessaging\MassMessagingListStatisticsParams;

/**
 * Filter by sent / scheduled / unsent (default = sent).
 */
enum Type: string
{
    case SENT = 'sent';

    case SCHEDULED = 'scheduled';

    case UNSENT = 'unsent';
}
