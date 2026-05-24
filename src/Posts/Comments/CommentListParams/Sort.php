<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\Comments\CommentListParams;

/**
 * Sort the returned comments (default = desc).
 */
enum Sort: string
{
    case DESC = 'desc';

    case ASC = 'asc';
}
