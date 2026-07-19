<?php

declare(strict_types=1);

namespace OnlyFansAPI\SharedTrackingLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\Pagination;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\SortingDeleted;
use OnlyFansAPI\SharedTrackingLinks\SharedTrackingLinkListParams\WithDeleted;

/**
 * List all Tracking Links (campaigns) shared with the account by other OF creators. Calls OnlyFans live and syncs to our cache.
 *
 * @see OnlyFansAPI\Services\SharedTrackingLinksService::list()
 *
 * @phpstan-type SharedTrackingLinkListParamsShape = array{
 *   limit?: int|null,
 *   offset?: int|null,
 *   pagination?: null|Pagination|value-of<Pagination>,
 *   sortingDeleted?: null|SortingDeleted|value-of<SortingDeleted>,
 *   stats?: string|null,
 *   synchronous?: bool|null,
 *   withDeleted?: null|WithDeleted|value-of<WithDeleted>,
 * }
 */
final class SharedTrackingLinkListParams implements BaseModel
{
    /** @use SdkModel<SharedTrackingLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of shared tracking links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Whether pagination metadata is enabled. Default `1`.
     *
     * @var value-of<Pagination>|null $pagination
     */
    #[Optional(enum: Pagination::class)]
    public ?int $pagination;

    /**
     * Whether deleted links participate in sorting. Default `1`.
     *
     * @var value-of<SortingDeleted>|null $sortingDeleted
     */
    #[Optional(enum: SortingDeleted::class)]
    public ?int $sortingDeleted;

    /**
     * Whether statistics are included. Default `true`. Must not be greater than 10 characters.
     */
    #[Optional]
    public ?string $stats;

    /**
     * Wait for the database sync instead of processing it in the background.
     */
    #[Optional]
    public ?bool $synchronous;

    /**
     * Whether to include deleted shared tracking links. Default `1`.
     *
     * @var value-of<WithDeleted>|null $withDeleted
     */
    #[Optional(enum: WithDeleted::class)]
    public ?int $withDeleted;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Pagination|value-of<Pagination>|null $pagination
     * @param SortingDeleted|value-of<SortingDeleted>|null $sortingDeleted
     * @param WithDeleted|value-of<WithDeleted>|null $withDeleted
     */
    public static function with(
        ?int $limit = null,
        ?int $offset = null,
        Pagination|int|null $pagination = null,
        SortingDeleted|int|null $sortingDeleted = null,
        ?string $stats = null,
        ?bool $synchronous = null,
        WithDeleted|int|null $withDeleted = null,
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $pagination && $self['pagination'] = $pagination;
        null !== $sortingDeleted && $self['sortingDeleted'] = $sortingDeleted;
        null !== $stats && $self['stats'] = $stats;
        null !== $synchronous && $self['synchronous'] = $synchronous;
        null !== $withDeleted && $self['withDeleted'] = $withDeleted;

        return $self;
    }

    /**
     * The number of shared tracking links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Whether pagination metadata is enabled. Default `1`.
     *
     * @param Pagination|value-of<Pagination> $pagination
     */
    public function withPagination(Pagination|int $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * Whether deleted links participate in sorting. Default `1`.
     *
     * @param SortingDeleted|value-of<SortingDeleted> $sortingDeleted
     */
    public function withSortingDeleted(SortingDeleted|int $sortingDeleted): self
    {
        $self = clone $this;
        $self['sortingDeleted'] = $sortingDeleted;

        return $self;
    }

    /**
     * Whether statistics are included. Default `true`. Must not be greater than 10 characters.
     */
    public function withStats(string $stats): self
    {
        $self = clone $this;
        $self['stats'] = $stats;

        return $self;
    }

    /**
     * Wait for the database sync instead of processing it in the background.
     */
    public function withSynchronous(bool $synchronous): self
    {
        $self = clone $this;
        $self['synchronous'] = $synchronous;

        return $self;
    }

    /**
     * Whether to include deleted shared tracking links. Default `1`.
     *
     * @param WithDeleted|value-of<WithDeleted> $withDeleted
     */
    public function withWithDeleted(WithDeleted|int $withDeleted): self
    {
        $self = clone $this;
        $self['withDeleted'] = $withDeleted;

        return $self;
    }
}
