<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryNewResponse\Data\ReleaseForm;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserShape = array{
 *   id?: int|null,
 *   avatar?: string|null,
 *   avatarThumbs?: string|null,
 *   isFromGuest?: bool|null,
 *   isIdentityVerified?: bool|null,
 *   ivStatus?: string|null,
 *   name?: string|null,
 *   username?: string|null,
 *   view?: string|null,
 * }
 */
final class User implements BaseModel
{
    /** @use SdkModel<UserShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional(nullable: true)]
    public ?string $avatar;

    #[Optional(nullable: true)]
    public ?string $avatarThumbs;

    #[Optional]
    public ?bool $isFromGuest;

    #[Optional]
    public ?bool $isIdentityVerified;

    #[Optional]
    public ?string $ivStatus;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $username;

    #[Optional]
    public ?string $view;

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
        ?string $avatar = null,
        ?string $avatarThumbs = null,
        ?bool $isFromGuest = null,
        ?bool $isIdentityVerified = null,
        ?string $ivStatus = null,
        ?string $name = null,
        ?string $username = null,
        ?string $view = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $avatarThumbs && $self['avatarThumbs'] = $avatarThumbs;
        null !== $isFromGuest && $self['isFromGuest'] = $isFromGuest;
        null !== $isIdentityVerified && $self['isIdentityVerified'] = $isIdentityVerified;
        null !== $ivStatus && $self['ivStatus'] = $ivStatus;
        null !== $name && $self['name'] = $name;
        null !== $username && $self['username'] = $username;
        null !== $view && $self['view'] = $view;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAvatar(?string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    public function withAvatarThumbs(?string $avatarThumbs): self
    {
        $self = clone $this;
        $self['avatarThumbs'] = $avatarThumbs;

        return $self;
    }

    public function withIsFromGuest(bool $isFromGuest): self
    {
        $self = clone $this;
        $self['isFromGuest'] = $isFromGuest;

        return $self;
    }

    public function withIsIdentityVerified(bool $isIdentityVerified): self
    {
        $self = clone $this;
        $self['isIdentityVerified'] = $isIdentityVerified;

        return $self;
    }

    public function withIvStatus(string $ivStatus): self
    {
        $self = clone $this;
        $self['ivStatus'] = $ivStatus;

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

    public function withView(string $view): self
    {
        $self = clone $this;
        $self['view'] = $view;

        return $self;
    }
}
