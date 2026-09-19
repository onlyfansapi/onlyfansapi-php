<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\ChatListResponse\Data\LastMessage;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FromUserShape = array{id?: int|null, _view?: string|null}
 */
final class FromUser implements BaseModel
{
    /** @use SdkModel<FromUserShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $_view;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $id = null, ?string $_view = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $_view && $self['_view'] = $_view;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withView(string $_view): self
    {
        $self = clone $this;
        $self['_view'] = $_view;

        return $self;
    }
}
