<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\TabsOrder;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Notifications\TabsOrder\TabsOrderGetResponse\_Meta;

/**
 * @phpstan-import-type _MetaShape from \OnlyFansAPI\Notifications\TabsOrder\TabsOrderGetResponse\_Meta
 *
 * @phpstan-type TabsOrderGetResponseShape = array{
 *   _meta?: null|_Meta|_MetaShape, data?: list<string>|null
 * }
 */
final class TabsOrderGetResponse implements BaseModel
{
    /** @use SdkModel<TabsOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?_Meta $_meta;

    /** @var list<string>|null $data */
    #[Optional(list: 'string')]
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
     * @param list<string>|null $data
     */
    public static function with(
        _Meta|array|null $_meta = null,
        ?array $data = null
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
     * @param list<string> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
