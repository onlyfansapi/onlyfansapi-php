<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListConversionsParams;

/**
 * Optional conversion type filter.
 */
enum ConversionType: string
{
    case NEW_SUBSCRIBER = 'new_subscriber';

    case NEW_TRANSACTION = 'new_transaction';

    case MESSAGE_RECEIVED = 'message_received';

    case FAN_SENT_1_MESSAGE = 'fan_sent_1_message';

    case FAN_SENT_3_MESSAGES = 'fan_sent_3_messages';
}
