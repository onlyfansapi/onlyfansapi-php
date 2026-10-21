<?php

declare(strict_types=1);

namespace OnlyFansAPI\SavedForLater\Posts;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List all posts that are marked as "Save For Later".
 *
 * @see OnlyFansAPI\Services\SavedForLater\PostsService::list()
 *
 * @phpstan-type PostListParamsShape = array{limit: int, offset: int}
 */
final class PostListParams implements BaseModel
{
    /** @use SdkModel<PostListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Maximum number of posts to return (default = 10).
     */
    #[Required]
    public int $limit;

    /**
     * Offset for pagination (default = 0).
     */
    #[Required]
    public int $offset;

    /**
     * `new PostListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostListParams::with(limit: ..., offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostListParams)->withLimit(...)->withOffset(...)
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
    public static function with(int $limit, int $offset): self
    {
        $self = new self;

        $self['limit'] = $limit;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Maximum number of posts to return (default = 10).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Offset for pagination (default = 0).
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
