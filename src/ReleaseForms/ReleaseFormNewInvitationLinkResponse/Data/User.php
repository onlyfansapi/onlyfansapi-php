<?php

declare(strict_types=1);

namespace Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse\Data\User\AvatarThumbs;

/**
 * @phpstan-import-type AvatarThumbsShape from \Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse\Data\User\AvatarThumbs
 *
 * @phpstan-type UserShape = array{
 *   id?: int|null,
 *   avatar?: string|null,
 *   avatarThumbs?: null|AvatarThumbs|AvatarThumbsShape,
 *   isActive?: bool|null,
 *   isDeleted?: bool|null,
 *   isVerified?: bool|null,
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

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?AvatarThumbs $avatarThumbs;

    #[Optional]
    public ?bool $isActive;

    #[Optional]
    public ?bool $isDeleted;

    #[Optional]
    public ?bool $isVerified;

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
     *
     * @param AvatarThumbs|AvatarThumbsShape|null $avatarThumbs
     */
    public static function with(
        ?int $id = null,
        ?string $avatar = null,
        AvatarThumbs|array|null $avatarThumbs = null,
        ?bool $isActive = null,
        ?bool $isDeleted = null,
        ?bool $isVerified = null,
        ?string $name = null,
        ?string $username = null,
        ?string $view = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $avatarThumbs && $self['avatarThumbs'] = $avatarThumbs;
        null !== $isActive && $self['isActive'] = $isActive;
        null !== $isDeleted && $self['isDeleted'] = $isDeleted;
        null !== $isVerified && $self['isVerified'] = $isVerified;
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

    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    /**
     * @param AvatarThumbs|AvatarThumbsShape $avatarThumbs
     */
    public function withAvatarThumbs(AvatarThumbs|array $avatarThumbs): self
    {
        $self = clone $this;
        $self['avatarThumbs'] = $avatarThumbs;

        return $self;
    }

    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    public function withIsDeleted(bool $isDeleted): self
    {
        $self = clone $this;
        $self['isDeleted'] = $isDeleted;

        return $self;
    }

    public function withIsVerified(bool $isVerified): self
    {
        $self = clone $this;
        $self['isVerified'] = $isVerified;

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
