<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\PostCreateParams;

/**
 * Include a poll or quiz within your post.
 */
enum VotingType: string
{
    case POLL = 'poll';

    case QUIZ = 'quiz';
}
