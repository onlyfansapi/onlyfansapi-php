<?php

declare(strict_types=1);

namespace OnlyFansAPI\DataExports\DataExportListResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\DataExports\DataExportListResponse\Data\Meta;

/**
 * @phpstan-import-type DataShape from \OnlyFansAPI\DataExports\DataExportListResponse\Data\Data as DataShape1
 * @phpstan-import-type MetaShape from \OnlyFansAPI\DataExports\DataExportListResponse\Data\Meta
 *
 * @phpstan-type DataShape = array{
 *   data?: list<\OnlyFansAPI\DataExports\DataExportListResponse\Data\Data|DataShape1>|null,
 *   meta?: null|Meta|MetaShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Data\Data>|null $data */
    #[Optional(
        list: Data\Data::class
    )]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data\Data|DataShape1>|null $data
     * @param Meta|MetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data\Data|DataShape1> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
