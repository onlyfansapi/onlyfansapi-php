<?php

declare(strict_types=1);

namespace Onlyfansapi\ReleaseForms;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\Filter;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\Sort;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\SortDirection;

/**
 * Get a paginated list of users that can be tagged in release forms. These are verified creators who have signed release forms to appear in your content. Use `offset` and `limit` for pagination.
 *
 * @see Onlyfansapi\Services\ReleaseFormsService::listTaggableUsers()
 *
 * @phpstan-type ReleaseFormListTaggableUsersParamsShape = array{
 *   filter?: null|Filter|value-of<Filter>,
 *   limit?: int|null,
 *   name?: string|null,
 *   offset?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 *   sortDirection?: null|SortDirection|value-of<SortDirection>,
 * }
 */
final class ReleaseFormListTaggableUsersParams implements BaseModel
{
    /** @use SdkModel<ReleaseFormListTaggableUsersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter users by type: `all` or `pending`.
     *
     * @var value-of<Filter>|null $filter
     */
    #[Optional(enum: Filter::class, nullable: true)]
    public ?string $filter;

    /**
     * Number of users to return per page (1-50). Must be at least 1. Must not be greater than 50.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Filter users by name or username.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * Number of users to skip for pagination. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Sort field: `date` or `name`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class, nullable: true)]
    public ?string $sort;

    /**
     * Sort direction: `desc` or `asc`.
     *
     * @var value-of<SortDirection>|null $sortDirection
     */
    #[Optional(enum: SortDirection::class, nullable: true)]
    public ?string $sortDirection;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|value-of<Filter>|null $filter
     * @param Sort|value-of<Sort>|null $sort
     * @param SortDirection|value-of<SortDirection>|null $sortDirection
     */
    public static function with(
        Filter|string|null $filter = null,
        ?int $limit = null,
        ?string $name = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        SortDirection|string|null $sortDirection = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $name && $self['name'] = $name;
        null !== $offset && $self['offset'] = $offset;
        null !== $sort && $self['sort'] = $sort;
        null !== $sortDirection && $self['sortDirection'] = $sortDirection;

        return $self;
    }

    /**
     * Filter users by type: `all` or `pending`.
     *
     * @param Filter|value-of<Filter>|null $filter
     */
    public function withFilter(Filter|string|null $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Number of users to return per page (1-50). Must be at least 1. Must not be greater than 50.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Filter users by name or username.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Number of users to skip for pagination. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Sort field: `date` or `name`.
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
     * Sort direction: `desc` or `asc`.
     *
     * @param SortDirection|value-of<SortDirection>|null $sortDirection
     */
    public function withSortDirection(
        SortDirection|string|null $sortDirection
    ): self {
        $self = clone $this;
        $self['sortDirection'] = $sortDirection;

        return $self;
    }
}
