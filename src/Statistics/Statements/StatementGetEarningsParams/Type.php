<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Statements\StatementGetEarningsParams;

/**
 * Filter by All / Subscriptions / Tips / Posts / Messages / Streams.
 */
enum Type: string
{
    case TOTAL = 'total';

    case SUBSCRIBES = 'subscribes';

    case TIPS = 'tips';

    case POST = 'post';

    case MESSAGES = 'messages';

    case STREAM = 'stream';
}
