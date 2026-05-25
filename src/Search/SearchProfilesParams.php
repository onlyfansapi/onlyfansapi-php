<?php

declare(strict_types=1);

namespace OnlyFansAPI\Search;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Search\SearchProfilesParams\Filter;
use OnlyFansAPI\Search\SearchProfilesParams\Sort;
use OnlyFansAPI\Search\SearchProfilesParams\SortDirection;

/**
 * Full-text search for profiles with filters for pricing, free trials, location, media count and more.
 *
 * @see OnlyFansAPI\Services\SearchService::profiles()
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Search\SearchProfilesParams\Filter
 *
 * @phpstan-type SearchProfilesParamsShape = array{
 *   cursor?: string|null,
 *   filter?: null|Filter|FilterShape,
 *   instagram?: string|null,
 *   limit?: int|null,
 *   location?: string|null,
 *   maxSubscribePrice?: float|null,
 *   minSubscribePrice?: float|null,
 *   query?: string|null,
 *   sort?: null|Sort|value-of<Sort>,
 *   sortDirection?: null|SortDirection|value-of<SortDirection>,
 *   tiktok?: string|null,
 *   website?: string|null,
 * }
 */
final class SearchProfilesParams implements BaseModel
{
    /** @use SdkModel<SearchProfilesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Cursor for pagination. Use the `next_cursor` from the previous response to get the next page of results.
     */
    #[Optional(nullable: true)]
    public ?string $cursor;

    #[Optional]
    public ?Filter $filter;

    /**
     * Filter by Instagram username.
     */
    #[Optional]
    public ?string $instagram;

    /**
     * The number of profiles to return. For each returned profile we charge your account 1 credit. Default: `10`. Must be at least 1. Must not be greater than 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Filter by location.
     */
    #[Optional]
    public ?string $location;

    /**
     * Filter by maximum subscribe price. Must be at least 0.00.
     */
    #[Optional]
    public ?float $maxSubscribePrice;

    /**
     * Filter by minimum subscribe price. Must be at least 0.00.
     */
    #[Optional]
    public ?float $minSubscribePrice;

    /**
     * Query for full text search in username, display name, bio. Must be at least 3 characters.
     */
    #[Optional]
    public ?string $query;

    /**
     * Field to sort by. ⭐️ Only available on the Pro and Enterprise plan.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * Direction for sorting. `desc` - highest value first. `asc` - lowest value first.
     *
     * @var value-of<SortDirection>|null $sortDirection
     */
    #[Optional(enum: SortDirection::class)]
    public ?string $sortDirection;

    /**
     * Filter by TikTok username.
     */
    #[Optional]
    public ?string $tiktok;

    /**
     * Filter by website.
     */
    #[Optional]
    public ?string $website;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     * @param Sort|value-of<Sort>|null $sort
     * @param SortDirection|value-of<SortDirection>|null $sortDirection
     */
    public static function with(
        ?string $cursor = null,
        Filter|array|null $filter = null,
        ?string $instagram = null,
        ?int $limit = null,
        ?string $location = null,
        ?float $maxSubscribePrice = null,
        ?float $minSubscribePrice = null,
        ?string $query = null,
        Sort|string|null $sort = null,
        SortDirection|string|null $sortDirection = null,
        ?string $tiktok = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $cursor && $self['cursor'] = $cursor;
        null !== $filter && $self['filter'] = $filter;
        null !== $instagram && $self['instagram'] = $instagram;
        null !== $limit && $self['limit'] = $limit;
        null !== $location && $self['location'] = $location;
        null !== $maxSubscribePrice && $self['maxSubscribePrice'] = $maxSubscribePrice;
        null !== $minSubscribePrice && $self['minSubscribePrice'] = $minSubscribePrice;
        null !== $query && $self['query'] = $query;
        null !== $sort && $self['sort'] = $sort;
        null !== $sortDirection && $self['sortDirection'] = $sortDirection;
        null !== $tiktok && $self['tiktok'] = $tiktok;
        null !== $website && $self['website'] = $website;

        return $self;
    }

    /**
     * Cursor for pagination. Use the `next_cursor` from the previous response to get the next page of results.
     */
    public function withCursor(?string $cursor): self
    {
        $self = clone $this;
        $self['cursor'] = $cursor;

        return $self;
    }

    /**
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Filter by Instagram username.
     */
    public function withInstagram(string $instagram): self
    {
        $self = clone $this;
        $self['instagram'] = $instagram;

        return $self;
    }

    /**
     * The number of profiles to return. For each returned profile we charge your account 1 credit. Default: `10`. Must be at least 1. Must not be greater than 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Filter by location.
     */
    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * Filter by maximum subscribe price. Must be at least 0.00.
     */
    public function withMaxSubscribePrice(float $maxSubscribePrice): self
    {
        $self = clone $this;
        $self['maxSubscribePrice'] = $maxSubscribePrice;

        return $self;
    }

    /**
     * Filter by minimum subscribe price. Must be at least 0.00.
     */
    public function withMinSubscribePrice(float $minSubscribePrice): self
    {
        $self = clone $this;
        $self['minSubscribePrice'] = $minSubscribePrice;

        return $self;
    }

    /**
     * Query for full text search in username, display name, bio. Must be at least 3 characters.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Field to sort by. ⭐️ Only available on the Pro and Enterprise plan.
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
     * Direction for sorting. `desc` - highest value first. `asc` - lowest value first.
     *
     * @param SortDirection|value-of<SortDirection> $sortDirection
     */
    public function withSortDirection(SortDirection|string $sortDirection): self
    {
        $self = clone $this;
        $self['sortDirection'] = $sortDirection;

        return $self;
    }

    /**
     * Filter by TikTok username.
     */
    public function withTiktok(string $tiktok): self
    {
        $self = clone $this;
        $self['tiktok'] = $tiktok;

        return $self;
    }

    /**
     * Filter by website.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
