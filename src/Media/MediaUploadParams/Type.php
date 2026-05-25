<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\MediaUploadParams;

/**
 * Set to `avatar` if this file will be used as a profile picture, `header` for a profile banner, or keep empty if this file will be for anything else.
 */
enum Type: string
{
    case DEFAULT = 'default';

    case AVATAR = 'avatar';

    case HEADER = 'header';
}
