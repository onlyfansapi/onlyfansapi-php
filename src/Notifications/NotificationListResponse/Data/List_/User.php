<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\NotificationListResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserShape = array{id?: int|null, _view?: string|null}
 */
final class User implements BaseModel
{
    /** @use SdkModel<UserShape> */
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
