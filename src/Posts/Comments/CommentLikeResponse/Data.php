<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Comments\CommentLikeResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   isLiked?: bool|null, likesCount?: int|null, success?: bool|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $isLiked;

    #[Optional]
    public ?int $likesCount;

    #[Optional]
    public ?bool $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $isLiked = null,
        ?int $likesCount = null,
        ?bool $success = null
    ): self {
        $self = new self;

        null !== $isLiked && $self['isLiked'] = $isLiked;
        null !== $likesCount && $self['likesCount'] = $likesCount;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    public function withIsLiked(bool $isLiked): self
    {
        $self = clone $this;
        $self['isLiked'] = $isLiked;

        return $self;
    }

    public function withLikesCount(int $likesCount): self
    {
        $self = clone $this;
        $self['likesCount'] = $likesCount;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
