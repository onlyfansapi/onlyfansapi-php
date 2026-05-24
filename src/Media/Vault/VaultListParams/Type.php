<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\VaultListParams;

/**
 * Filter the results by a media type. Keep empty to show all media.
 */
enum Type: string
{
    case PHOTO = 'photo';

    case GIF = 'gif';

    case VIDEO = 'video';

    case AUDIO = 'audio';
}
