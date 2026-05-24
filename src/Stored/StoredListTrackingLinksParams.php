<?php

declare(strict_types=1);

namespace Onlyfansapi\Stored;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List all stored tracking links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
 *
 * @see Onlyfansapi\Services\StoredService::listTrackingLinks()
 *
 * @phpstan-type StoredListTrackingLinksParamsShape = array{
 *   filterIncludeSmartLinks?: bool|null,
 *   filterSearch?: string|null,
 *   filterTags?: string|null,
 *   limit?: int|null,
 *   offset?: int|null,
 * }
 */
final class StoredListTrackingLinksParams implements BaseModel
{
    /** @use SdkModel<StoredListTrackingLinksParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Include tracking links created by Smart Links. Default `false`.
     */
    #[Optional]
    public ?bool $filterIncludeSmartLinks;

    /**
     * Search campaign name, creator username, or a pasted OnlyFans tracking link URL.
     */
    #[Optional]
    public ?string $filterSearch;

    /**
     * Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag.
     */
    #[Optional]
    public ?string $filterTags;

    /**
     * The number of tracking links to return. Default `10`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

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
        ?bool $filterIncludeSmartLinks = null,
        ?string $filterSearch = null,
        ?string $filterTags = null,
        ?int $limit = null,
        ?int $offset = null,
    ): self {
        $self = new self;

        null !== $filterIncludeSmartLinks && $self['filterIncludeSmartLinks'] = $filterIncludeSmartLinks;
        null !== $filterSearch && $self['filterSearch'] = $filterSearch;
        null !== $filterTags && $self['filterTags'] = $filterTags;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Include tracking links created by Smart Links. Default `false`.
     */
    public function withFilterIncludeSmartLinks(
        bool $filterIncludeSmartLinks
    ): self {
        $self = clone $this;
        $self['filterIncludeSmartLinks'] = $filterIncludeSmartLinks;

        return $self;
    }

    /**
     * Search campaign name, creator username, or a pasted OnlyFans tracking link URL.
     */
    public function withFilterSearch(string $filterSearch): self
    {
        $self = clone $this;
        $self['filterSearch'] = $filterSearch;

        return $self;
    }

    /**
     * Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag.
     */
    public function withFilterTags(string $filterTags): self
    {
        $self = clone $this;
        $self['filterTags'] = $filterTags;

        return $self;
    }

    /**
     * The number of tracking links to return. Default `10`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
