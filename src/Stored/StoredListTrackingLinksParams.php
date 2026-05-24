<?php

declare(strict_types=1);

namespace Onlyfansapi\Stored;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Stored\StoredListTrackingLinksParams\Filter;

/**
 * List all stored tracking links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
 *
 * @see Onlyfansapi\Services\StoredService::listTrackingLinks()
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Stored\StoredListTrackingLinksParams\Filter
 *
 * @phpstan-type StoredListTrackingLinksParamsShape = array{
 *   filter?: null|Filter|FilterShape, limit?: int|null, offset?: int|null
 * }
 */
final class StoredListTrackingLinksParams implements BaseModel
{
    /** @use SdkModel<StoredListTrackingLinksParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?Filter $filter;

    /**
     * The number of tracking links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
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
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

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
     * The number of tracking links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
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
}
