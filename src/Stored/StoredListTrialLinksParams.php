<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stored;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stored\StoredListTrialLinksParams\Filter;

/**
 * List all stored free trial links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
 *
 * @see OnlyFansAPI\Services\StoredService::listTrialLinks()
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListTrialLinksParams\Filter
 *
 * @phpstan-type StoredListTrialLinksParamsShape = array{
 *   filter?: null|Filter|FilterShape, limit?: int|null, offset?: int|null
 * }
 */
final class StoredListTrialLinksParams implements BaseModel
{
    /** @use SdkModel<StoredListTrialLinksParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?Filter $filter;

    /**
     * The number of trial links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
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
     * The number of trial links to return. Default `10`. Must be at least 1. Must not be greater than 1000.
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
