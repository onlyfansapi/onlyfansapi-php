<?php

declare(strict_types=1);

namespace OnlyFansAPI\Search;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Search\SearchProfilesResponse\_Meta;
use OnlyFansAPI\Search\SearchProfilesResponse\_Pagination;
use OnlyFansAPI\Search\SearchProfilesResponse\Data;

/**
 * @phpstan-import-type _MetaShape from \OnlyFansAPI\Search\SearchProfilesResponse\_Meta
 * @phpstan-import-type _PaginationShape from \OnlyFansAPI\Search\SearchProfilesResponse\_Pagination
 * @phpstan-import-type DataShape from \OnlyFansAPI\Search\SearchProfilesResponse\Data
 *
 * @phpstan-type SearchProfilesResponseShape = array{
 *   _meta?: null|_Meta|_MetaShape,
 *   _pagination?: null|_Pagination|_PaginationShape,
 *   data?: list<Data|DataShape>|null,
 * }
 */
final class SearchProfilesResponse implements BaseModel
{
    /** @use SdkModel<SearchProfilesResponseShape> */
    use SdkModel;

    #[Optional]
    public ?_Meta $_meta;

    #[Optional]
    public ?_Pagination $_pagination;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param _Meta|_MetaShape|null $_meta
     * @param _Pagination|_PaginationShape|null $_pagination
     * @param list<Data|DataShape>|null $data
     */
    public static function with(
        _Meta|array|null $_meta = null,
        _Pagination|array|null $_pagination = null,
        ?array $data = null,
    ): self {
        $self = new self;

        null !== $_meta && $self['_meta'] = $_meta;
        null !== $_pagination && $self['_pagination'] = $_pagination;
        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param _Meta|_MetaShape $_meta
     */
    public function withMeta(_Meta|array $_meta): self
    {
        $self = clone $this;
        $self['_meta'] = $_meta;

        return $self;
    }

    /**
     * @param _Pagination|_PaginationShape $_pagination
     */
    public function withPagination(_Pagination|array $_pagination): self
    {
        $self = clone $this;
        $self['_pagination'] = $_pagination;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
