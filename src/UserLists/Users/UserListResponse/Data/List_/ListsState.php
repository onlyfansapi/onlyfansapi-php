<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users\UserListResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListsStateShape = array{
 *   id?: string|null,
 *   canAddUser?: bool|null,
 *   cannotAddUserReason?: string|null,
 *   hasUser?: bool|null,
 *   name?: string|null,
 *   type?: string|null,
 * }
 */
final class ListsState implements BaseModel
{
    /** @use SdkModel<ListsStateShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?bool $canAddUser;

    #[Optional]
    public ?string $cannotAddUserReason;

    #[Optional]
    public ?bool $hasUser;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?bool $canAddUser = null,
        ?string $cannotAddUserReason = null,
        ?bool $hasUser = null,
        ?string $name = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canAddUser && $self['canAddUser'] = $canAddUser;
        null !== $cannotAddUserReason && $self['cannotAddUserReason'] = $cannotAddUserReason;
        null !== $hasUser && $self['hasUser'] = $hasUser;
        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanAddUser(bool $canAddUser): self
    {
        $self = clone $this;
        $self['canAddUser'] = $canAddUser;

        return $self;
    }

    public function withCannotAddUserReason(string $cannotAddUserReason): self
    {
        $self = clone $this;
        $self['cannotAddUserReason'] = $cannotAddUserReason;

        return $self;
    }

    public function withHasUser(bool $hasUser): self
    {
        $self = clone $this;
        $self['hasUser'] = $hasUser;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
