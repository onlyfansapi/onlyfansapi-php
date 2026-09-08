<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\ChatListMediaParams;

/**
 * Filter by specific media types. Keep empty to return all.
 */
enum Type: string
{
    case PHOTOS = 'photos';

    case VIDEOS = 'videos';

    case AUDIOS = 'audios';
}
