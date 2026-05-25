<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Sort;
use OnlyFansAPI\TrackingLinks\TrackingLinkListParams\Sortby;

/**
 * List all tracking links for the account and revenue data.
 *
 * @see OnlyFansAPI\Services\TrackingLinksService::list()
 *
 * @phpstan-type TrackingLinkListParamsShape = array{
 *   endDate?: string|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 *   sortby?: null|Sortby|value-of<Sortby>,
 *   startDate?: string|null,
 *   synchronous?: bool|null,
 *   withDeleted?: bool|null,
 * }
 */
final class TrackingLinkListParams implements BaseModel
{
    /** @use SdkModel<TrackingLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for Tracking Links. Keep empty to get all.
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * The number of tracking links to return. Default `3`.
     */
    #[Optional(nullable: true)]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional(nullable: true)]
    public ?int $offset;

    /**
     * Sort the results. Default `desc`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class, nullable: true)]
    public ?string $sort;

    /**
     * Sort by subscriber count (claims), or creation date.
     *
     * @var value-of<Sortby>|null $sortby
     */
    #[Optional(enum: Sortby::class, nullable: true)]
    public ?string $sortby;

    /**
     * The start date for Tracking Links. Keep empty to get all.
     */
    #[Optional(nullable: true)]
    public ?string $startDate;

    /**
     * Wait for the revenue data to finish processing, instead of processing in the background. **Will result in longer response times, use with caution**. Default `false`.
     */
    #[Optional(nullable: true)]
    public ?bool $synchronous;

    /**
     * Whether or not to include deleted tracking links in the response. Default `false`.
     */
    #[Optional(nullable: true)]
    public ?bool $withDeleted;

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
     * @param Sortby|value-of<Sortby>|null $sortby
     */
    public static function with(
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        Sortby|string|null $sortby = null,
        ?string $startDate = null,
        ?bool $synchronous = null,
        ?bool $withDeleted = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $sort && $self['sort'] = $sort;
        null !== $sortby && $self['sortby'] = $sortby;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $synchronous && $self['synchronous'] = $synchronous;
        null !== $withDeleted && $self['withDeleted'] = $withDeleted;

        return $self;
    }

    /**
     * The end date for Tracking Links. Keep empty to get all.
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The number of tracking links to return. Default `3`.
     */
    public function withLimit(?int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`.
     */
    public function withOffset(?int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Sort the results. Default `desc`.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public function withSort(Sort|string|null $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Sort by subscriber count (claims), or creation date.
     *
     * @param Sortby|value-of<Sortby>|null $sortby
     */
    public function withSortby(Sortby|string|null $sortby): self
    {
        $self = clone $this;
        $self['sortby'] = $sortby;

        return $self;
    }

    /**
     * The start date for Tracking Links. Keep empty to get all.
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Wait for the revenue data to finish processing, instead of processing in the background. **Will result in longer response times, use with caution**. Default `false`.
     */
    public function withSynchronous(?bool $synchronous): self
    {
        $self = clone $this;
        $self['synchronous'] = $synchronous;

        return $self;
    }

    /**
     * Whether or not to include deleted tracking links in the response. Default `false`.
     */
    public function withWithDeleted(?bool $withDeleted): self
    {
        $self = clone $this;
        $self['withDeleted'] = $withDeleted;

        return $self;
    }
}
