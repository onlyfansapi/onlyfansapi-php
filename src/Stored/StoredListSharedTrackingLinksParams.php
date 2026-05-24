<?php

declare(strict_types=1);

namespace Onlyfansapi\Stored;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List all shared Tracking Links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
 *
 * @see Onlyfansapi\Services\StoredService::listSharedTrackingLinks()
 *
 * @phpstan-type StoredListSharedTrackingLinksParamsShape = array{
 *   filterSearch?: string|null,
 *   filterTags?: string|null,
 *   limit?: int|null,
 *   offset?: int|null,
 * }
 */
final class StoredListSharedTrackingLinksParams implements BaseModel
{
    /** @use SdkModel<StoredListSharedTrackingLinksParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Search campaign name, owner username, or a pasted OnlyFans tracking link URL.
     */
    #[Optional]
    public ?string $filterSearch;

    /**
     * Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag. Tag namespace is shared with owned Tracking Links.
     */
    #[Optional]
    public ?string $filterTags;

    /**
     * The number of shared tracking links to return. Default `10`.
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
        ?string $filterSearch = null,
        ?string $filterTags = null,
        ?int $limit = null,
        ?int $offset = null,
    ): self {
        $self = new self;

        null !== $filterSearch && $self['filterSearch'] = $filterSearch;
        null !== $filterTags && $self['filterTags'] = $filterTags;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Search campaign name, owner username, or a pasted OnlyFans tracking link URL.
     */
    public function withFilterSearch(string $filterSearch): self
    {
        $self = clone $this;
        $self['filterSearch'] = $filterSearch;

        return $self;
    }

    /**
     * Filter by one or more tag names or slugs. Accepts CSV or repeated array values (`filter[tags][]=...`) and matches any tag. Tag namespace is shared with owned Tracking Links.
     */
    public function withFilterTags(string $filterTags): self
    {
        $self = clone $this;
        $self['filterTags'] = $filterTags;

        return $self;
    }

    /**
     * The number of shared tracking links to return. Default `10`.
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
