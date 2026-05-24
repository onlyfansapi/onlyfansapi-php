<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\Comments;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Posts\Comments\CommentListParams\Sort;

/**
 * Get comments from one of your posts.
 *
 * @see Onlyfansapi\Services\Posts\CommentsService::list()
 *
 * @phpstan-type CommentListParamsShape = array{
 *   account: string,
 *   limit?: int|null,
 *   offset?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class CommentListParams implements BaseModel
{
    /** @use SdkModel<CommentListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Number of comments to return (default = 10).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Number of comments to skip for pagination.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Sort the returned comments (default = desc).
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * `new CommentListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentListParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentListParams)->withAccount(...)
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
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        string $account,
        ?int $limit = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Number of comments to return (default = 10).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of comments to skip for pagination.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Sort the returned comments (default = desc).
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
