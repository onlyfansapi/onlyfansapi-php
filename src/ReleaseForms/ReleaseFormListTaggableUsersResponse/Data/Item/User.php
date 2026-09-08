<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data\Item;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data\Item\User\AvatarThumbs;

/**
 * @phpstan-import-type AvatarThumbsShape from \OnlyFansAPI\ReleaseForms\ReleaseFormListTaggableUsersResponse\Data\Item\User\AvatarThumbs
 *
 * @phpstan-type UserShape = array{
 *   id?: int|null,
 *   avatar?: string|null,
 *   avatarThumbs?: null|AvatarThumbs|AvatarThumbsShape,
 *   hiddenForRf?: bool|null,
 *   isFromGuest?: bool|null,
 *   isVerified?: bool|null,
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

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?AvatarThumbs $avatarThumbs;

    #[Optional]
    public ?bool $hiddenForRf;

    #[Optional]
    public ?bool $isFromGuest;

    #[Optional]
    public ?bool $isVerified;

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
     *
     * @param AvatarThumbs|AvatarThumbsShape|null $avatarThumbs
     */
    public static function with(
        ?int $id = null,
        ?string $avatar = null,
        AvatarThumbs|array|null $avatarThumbs = null,
        ?bool $hiddenForRf = null,
        ?bool $isFromGuest = null,
        ?bool $isVerified = null,
        ?string $ivStatus = null,
        ?string $name = null,
        ?string $username = null,
        ?string $view = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $avatarThumbs && $self['avatarThumbs'] = $avatarThumbs;
        null !== $hiddenForRf && $self['hiddenForRf'] = $hiddenForRf;
        null !== $isFromGuest && $self['isFromGuest'] = $isFromGuest;
        null !== $isVerified && $self['isVerified'] = $isVerified;
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

    public function withHiddenForRf(bool $hiddenForRf): self
    {
        $self = clone $this;
        $self['hiddenForRf'] = $hiddenForRf;

        return $self;
    }

    public function withIsFromGuest(bool $isFromGuest): self
    {
        $self = clone $this;
        $self['isFromGuest'] = $isFromGuest;

        return $self;
    }

    public function withIsVerified(bool $isVerified): self
    {
        $self = clone $this;
        $self['isVerified'] = $isVerified;

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
