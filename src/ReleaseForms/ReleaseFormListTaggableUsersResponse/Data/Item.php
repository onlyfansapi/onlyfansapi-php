<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data\Item\User;

/**
 * @phpstan-import-type UserShape from \OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data\Item\User
 *
 * @phpstan-type ItemShape = array{
 *   id?: int|null,
 *   name?: string|null,
 *   type?: string|null,
 *   user?: null|User|UserShape,
 * }
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?User $user;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param User|UserShape|null $user
     */
    public static function with(
        ?int $id = null,
        ?string $name = null,
        ?string $type = null,
        User|array|null $user = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;
        null !== $user && $self['user'] = $user;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    /**
     * @param User|UserShape $user
     */
    public function withUser(User|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
