<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Pagination;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Sort;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Sortby;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\WithDeleted;

/**
 * List all tracking links for the account and revenue data.
 *
 * @see OnlyFansAPI\Services\TrackingLinksService::list()
 *
 * @phpstan-type TrackingLinkListParamsShape = array{
 *   endDate?: string|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   pagination?: null|Pagination|value-of<Pagination>,
 *   sort?: null|Sort|value-of<Sort>,
 *   sortby?: null|Sortby|value-of<Sortby>,
 *   startDate?: string|null,
 *   synchronous?: bool|null,
 *   withDeleted?: null|WithDeleted|value-of<WithDeleted>,
 * }
 */
final class TrackingLinkListParams implements BaseModel
{
    /** @use SdkModel<TrackingLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for tracking links. Keep empty to get all. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * The number of tracking links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /** @var value-of<Pagination>|null $pagination */
    #[Optional(enum: Pagination::class)]
    public ?int $pagination;

    /**
     * Sort direction. Default `desc`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * Sort by subscriber count (`claims`) or creation date (`created_date`).
     *
     * @var value-of<Sortby>|null $sortby
     */
    #[Optional(enum: Sortby::class)]
    public ?string $sortby;

    /**
     * The start date for tracking links. Keep empty to get all. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $startDate;

    /**
     * Wait for revenue calculation instead of processing it in the background.
     */
    #[Optional]
    public ?bool $synchronous;

    /**
     * Whether to include deleted tracking links. Default `true`.
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
     * @param Sort|value-of<Sort>|null $sort
     * @param Sortby|value-of<Sortby>|null $sortby
     * @param WithDeleted|value-of<WithDeleted>|null $withDeleted
     */
    public static function with(
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        Pagination|int|null $pagination = null,
        Sort|string|null $sort = null,
        Sortby|string|null $sortby = null,
        ?string $startDate = null,
        ?bool $synchronous = null,
        WithDeleted|int|null $withDeleted = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $pagination && $self['pagination'] = $pagination;
        null !== $sort && $self['sort'] = $sort;
        null !== $sortby && $self['sortby'] = $sortby;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $synchronous && $self['synchronous'] = $synchronous;
        null !== $withDeleted && $self['withDeleted'] = $withDeleted;

        return $self;
    }

    /**
     * The end date for tracking links. Keep empty to get all. Must not be greater than 255 characters.
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The number of tracking links to return. Default `10`. Must be at least 1. Must not be greater than 100.
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
     * @param Pagination|value-of<Pagination> $pagination
     */
    public function withPagination(Pagination|int $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * Sort direction. Default `desc`.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Sort by subscriber count (`claims`) or creation date (`created_date`).
     *
     * @param Sortby|value-of<Sortby> $sortby
     */
    public function withSortby(Sortby|string $sortby): self
    {
        $self = clone $this;
        $self['sortby'] = $sortby;

        return $self;
    }

    /**
     * The start date for tracking links. Keep empty to get all. Must not be greater than 255 characters.
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Wait for revenue calculation instead of processing it in the background.
     */
    public function withSynchronous(bool $synchronous): self
    {
        $self = clone $this;
        $self['synchronous'] = $synchronous;

        return $self;
    }

    /**
     * Whether to include deleted tracking links. Default `true`.
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
