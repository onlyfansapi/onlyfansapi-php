<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Comments;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Like a comment on one of your posts.
 *
 * @see OnlyFansAPI\Services\Posts\CommentsService::like()
 *
 * @phpstan-type CommentLikeParamsShape = array{account: string, postID: int}
 */
final class CommentLikeParams implements BaseModel
{
    /** @use SdkModel<CommentLikeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public int $postID;

    /**
     * `new CommentLikeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentLikeParams::with(account: ..., postID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentLikeParams)->withAccount(...)->withPostID(...)
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
