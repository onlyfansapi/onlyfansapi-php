<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\Messages;

use Onlyfansapi\Chats\Messages\MessageSearchResponse\_Meta;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type _MetaShape from \Onlyfansapi\Chats\Messages\MessageSearchResponse\_Meta
 *
 * @phpstan-type MessageSearchResponseShape = array{
 *   _meta?: null|_Meta|_MetaShape, data?: list<int>|null
 * }
 */
final class MessageSearchResponse implements BaseModel
{
    /** @use SdkModel<MessageSearchResponseShape> */
    use SdkModel;

    #[Optional]
    public ?_Meta $_meta;

    /** @var list<int>|null $data */
    #[Optional(list: 'int')]
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
     * @param list<int>|null $data
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
     * @param list<int> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
