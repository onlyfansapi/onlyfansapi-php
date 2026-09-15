<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\Tags;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\TrackingLinks\Tags\TagListResponse\_Meta;
use OnlyFansAPI\TrackingLinks\Tags\TagListResponse\Data;

/**
 * @phpstan-import-type _MetaShape from \OnlyFansAPI\TrackingLinks\Tags\TagListResponse\_Meta
 * @phpstan-import-type DataShape from \OnlyFansAPI\TrackingLinks\Tags\TagListResponse\Data
 *
 * @phpstan-type TagListResponseShape = array{
 *   _meta?: null|_Meta|_MetaShape, data?: null|Data|DataShape
 * }
 */
final class TagListResponse implements BaseModel
{
    /** @use SdkModel<TagListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?_Meta $_meta;

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
     * @param Data|DataShape|null $data
     */
    public static function with(
        _Meta|array|null $_meta = null,
        Data|array|null $data = null
    ): self {
        $self = new self;

        null !== $_meta && $self['_meta'] = $_meta;
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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
