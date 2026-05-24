<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\Comments;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Like a comment on one of your posts.
 *
 * @see Onlyfansapi\Services\Posts\CommentsService::likeComment()
 *
 * @phpstan-type CommentLikeCommentParamsShape = array{
 *   account: string, postID: int
 * }
 */
final class CommentLikeCommentParams implements BaseModel
{
    /** @use SdkModel<CommentLikeCommentParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public int $postID;

    /**
     * `new CommentLikeCommentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentLikeCommentParams::with(account: ..., postID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentLikeCommentParams)->withAccount(...)->withPostID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $account, int $postID): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['postID'] = $postID;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    public function withPostID(int $postID): self
    {
        $self = clone $this;
        $self['postID'] = $postID;

        return $self;
    }
}
