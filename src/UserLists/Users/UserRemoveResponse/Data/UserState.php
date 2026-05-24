<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists\Users\UserRemoveResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserStateShape = array{
 *   id?: int|null,
 *   canAddUser?: bool|null,
 *   cannotAddUserReason?: string|null,
 *   hasUser?: bool|null,
 *   name?: string|null,
 *   type?: string|null,
 * }
 */
final class UserState implements BaseModel
{
    /** @use SdkModel<UserStateShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canAddUser;

    #[Optional(nullable: true)]
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
        ?int $id = null,
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

    public function withID(int $id): self
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

    public function withCannotAddUserReason(?string $cannotAddUserReason): self
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
