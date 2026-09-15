<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\PostCreateParams;

/**
 * Include a poll or quiz within your post.
 */
enum VotingType: string
{
    case POLL = 'poll';

    case QUIZ = 'quiz';
}
