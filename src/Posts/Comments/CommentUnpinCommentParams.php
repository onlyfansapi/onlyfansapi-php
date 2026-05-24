<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\Comments;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Unpin a comment from one of your posts.
 *
 * @see Onlyfansapi\Services\Posts\CommentsService::unpinComment()
 *
 * @phpstan-type CommentUnpinCommentParamsShape = array{
 *   account: string, postID: int
 * }
 */
final class CommentUnpinCommentParams implements BaseModel
{
    /** @use SdkModel<CommentUnpinCommentParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public int $postID;

    /**
     * `new CommentUnpinCommentParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentUnpinCommentParams::with(account: ..., postID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentUnpinCommentParams)->withAccount(...)->withPostID(...)
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
