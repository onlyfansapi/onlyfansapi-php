<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\PostListParams;

/**
 * Sort the returned posts (default = desc).
 */
enum Sort: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
