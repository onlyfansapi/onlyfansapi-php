<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\MediaScrapeParams;

/**
 * The file type to scrape. Only allowed when using `media_id`.
 */
enum FileType: string
{
    case FULL = 'full';

    case THUMB = 'thumb';

    case PREVIEW = 'preview';

    case SQUARE_PREVIEW = 'squarePreview';
}
