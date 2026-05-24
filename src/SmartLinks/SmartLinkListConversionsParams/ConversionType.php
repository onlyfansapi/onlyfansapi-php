<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkListConversionsParams;

/**
 * Optional conversion type filter.
 */
enum ConversionType: string
{
    case NEW_SUBSCRIBER = 'new_subscriber';

    case NEW_TRANSACTION = 'new_transaction';

    case MESSAGE_RECEIVED = 'message_received';

    case FAN_SENT_3_MESSAGES = 'fan_sent_3_messages';
}
