<?php

declare(strict_types=1);

namespace OnlyFansAPI\Queue\QueueListParams;

enum Type: string
{
    case CHAT = 'chat';

    case POST = 'post';
}
