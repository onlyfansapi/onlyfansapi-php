<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryCreateParams\Text;

/**
 * Text alignment. Default `left`.
 */
enum TextAlign: string
{
    case LEFT = 'left';

    case CENTER = 'center';

    case RIGHT = 'right';
}
