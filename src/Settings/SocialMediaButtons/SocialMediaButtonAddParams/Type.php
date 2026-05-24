<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonAddParams;

/**
 * The button type.
 */
enum Type: string
{
    case INSTAGRAM = 'instagram';

    case X = 'x';

    case FACEBOOK = 'facebook';

    case YOUTUBE = 'youtube';

    case TIKTOK = 'tiktok';

    case SNAPCHAT = 'snapchat';

    case AMAZON = 'amazon';

    case TWITCH = 'twitch';

    case DISCORD = 'discord';

    case PATREON = 'patreon';

    case PINTEREST = 'pinterest';

    case ETSY = 'etsy';

    case BEREAL = 'bereal';

    case KICK = 'kick';

    case DEPOP = 'depop';

    case POSHMARK = 'poshmark';

    case VSCO = 'vsco';

    case THREADS = 'threads';

    case THRONE = 'throne';

    case SHOPLTK = 'shopltk';

    case OFTV = 'oftv';

    case BLUESKY = 'bluesky';
}
