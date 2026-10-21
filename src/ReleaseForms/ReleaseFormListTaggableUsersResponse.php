<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\_Meta;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\_Pagination;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data;

/**
 * @phpstan-import-type _MetaShape from \OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\_Meta
 * @phpstan-import-type _PaginationShape from \OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\_Pagination
 * @phpstan-import-type DataShape from \OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data
 *
 * @phpstan-type ReleaseFormListTaggableUsersResponseShape = array{
 *   _meta?: null|_Meta|_MetaShape,
 *   _pagination?: null|_Pagination|_PaginationShape,
 *   data?: null|Data|DataShape,
 * }
 */
final class ReleaseFormListTaggableUsersResponse implements BaseModel
{
    /** @use SdkModel<ReleaseFormListTaggableUsersResponseShape> */
    use SdkModel;

    #[Optional]
    public ?_Meta $_meta;

    #[Optional]
    public ?_Pagination $_pagination;

    #[Optional]
    public ?Data $data;

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
     * @param Data|DataShape|null $data
     */
    public static function with(
        _Meta|array|null $_meta = null,
        _Pagination|array|null $_pagination = null,
        Data|array|null $data = null,
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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
