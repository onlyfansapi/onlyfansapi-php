<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Comments\CommentListParams;

/**
 * Sort the returned comments (default = desc).
 */
enum Sort: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
