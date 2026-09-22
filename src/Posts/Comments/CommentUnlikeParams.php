<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Comments;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Unlike a comment on one of your posts.
 *
 * @see OnlyFansAPI\Services\Posts\CommentsService::unlike()
 *
 * @phpstan-type CommentUnlikeParamsShape = array{account: string, postID: int}
 */
final class CommentUnlikeParams implements BaseModel
{
    /** @use SdkModel<CommentUnlikeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public int $postID;

    /**
     * `new CommentUnlikeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentUnlikeParams::with(account: ..., postID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentUnlikeParams)->withAccount(...)->withPostID(...)
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
