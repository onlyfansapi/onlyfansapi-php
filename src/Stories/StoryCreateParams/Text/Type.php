<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryCreateParams\Text;

/**
 * Overlay type. Default `text`.
 */
enum Type: string
{
    case TEXT = 'text';

    case MENTION = 'mention';
}
