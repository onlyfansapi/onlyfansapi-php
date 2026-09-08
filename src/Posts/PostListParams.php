<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\PostListParams\Order;
use OnlyFansAPI\Posts\PostListParams\Sort;

/**
 * Get posts from your OnlyFans account.
 *
 * @see OnlyFansAPI\Services\PostsService::list()
 *
 * @phpstan-type PostListParamsShape = array{
 *   counters?: bool|null,
 *   limit?: int|null,
 *   minimumPublishDate?: string|null,
 *   offset?: int|null,
 *   order?: null|Order|value-of<Order>,
 *   pinned?: bool|null,
 *   query?: string|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class PostListParams implements BaseModel
{
    /** @use SdkModel<PostListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set to true to include an array of counters (see example responses).
     */
    #[Optional]
    public ?bool $counters;

    /**
     * Number of posts to return (default = 10).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Filter posts by minimum publish date.
     */
    #[Optional]
    public ?string $minimumPublishDate;

    /**
     * Number of posts to skip for pagination.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Order the returned posts (default = publish_date).
     *
     * @var value-of<Order>|null $order
     */
    #[Optional(enum: Order::class)]
    public ?string $order;

    /**
     * Set to true to only show pinned posts.
     */
    #[Optional]
    public ?bool $pinned;

    /**
     * Search query to filter posts.
     */
    #[Optional]
    public ?string $query;

    /**
     * Sort the returned posts (default = desc).
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Order|value-of<Order>|null $order
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?bool $counters = null,
        ?int $limit = null,
        ?string $minimumPublishDate = null,
        ?int $offset = null,
        Order|string|null $order = null,
        ?bool $pinned = null,
        ?string $query = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $counters && $self['counters'] = $counters;
        null !== $limit && $self['limit'] = $limit;
        null !== $minimumPublishDate && $self['minimumPublishDate'] = $minimumPublishDate;
        null !== $offset && $self['offset'] = $offset;
        null !== $order && $self['order'] = $order;
        null !== $pinned && $self['pinned'] = $pinned;
        null !== $query && $self['query'] = $query;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Set to true to include an array of counters (see example responses).
     */
    public function withCounters(bool $counters): self
    {
        $self = clone $this;
        $self['counters'] = $counters;

        return $self;
    }

    /**
     * Number of posts to return (default = 10).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Filter posts by minimum publish date.
     */
    public function withMinimumPublishDate(string $minimumPublishDate): self
    {
        $self = clone $this;
        $self['minimumPublishDate'] = $minimumPublishDate;

        return $self;
    }

    /**
     * Number of posts to skip for pagination.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Order the returned posts (default = publish_date).
     *
     * @param Order|value-of<Order> $order
     */
    public function withOrder(Order|string $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    /**
     * Set to true to only show pinned posts.
     */
    public function withPinned(bool $pinned): self
    {
        $self = clone $this;
        $self['pinned'] = $pinned;

        return $self;
    }

    /**
     * Search query to filter posts.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Sort the returned posts (default = desc).
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
