<?php

declare(strict_types=1);

namespace OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type OwnerShape = array{
 *   id?: int|null,
 *   avatarThumbURL?: string|null,
 *   name?: string|null,
 *   username?: string|null,
 * }
 */
final class Owner implements BaseModel
{
    /** @use SdkModel<OwnerShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional('avatarThumbUrl')]
    public ?string $avatarThumbURL;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $username;

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
        ?string $avatarThumbURL = null,
        ?string $name = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $avatarThumbURL && $self['avatarThumbURL'] = $avatarThumbURL;
        null !== $name && $self['name'] = $name;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAvatarThumbURL(string $avatarThumbURL): self
    {
        $self = clone $this;
        $self['avatarThumbURL'] = $avatarThumbURL;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
