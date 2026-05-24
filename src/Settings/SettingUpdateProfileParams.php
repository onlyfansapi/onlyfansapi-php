<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Updates the account profile. **Only include the fields you want to update.** To make a field empty, set it to `null`.
 *
 * @see Onlyfansapi\Services\SettingsService::updateProfile()
 *
 * @phpstan-type SettingUpdateProfileParamsShape = array{
 *   about?: string|null,
 *   avatar?: string|null,
 *   header?: string|null,
 *   location?: string|null,
 *   name?: string|null,
 *   username?: string|null,
 *   website?: string|null,
 *   wishlist?: string|null,
 * }
 */
final class SettingUpdateProfileParams implements BaseModel
{
    /** @use SdkModel<SettingUpdateProfileParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The new bio to use. Set to `null` to empty it.
     */
    #[Optional(nullable: true)]
    public ?string $about;

    /**
     * The new avatar to use. Must be a `ofapi_media_` ID. Refer to our `/media/upload` endpoint on how to get this.
     */
    #[Optional]
    public ?string $avatar;

    /**
     * The new header (banner) to use. Must be a `ofapi_media_` ID. Refer to our `/media/upload` endpoint on how to get this.
     */
    #[Optional]
    public ?string $header;

    /**
     * The new location to use. Set to `null` to empty it.
     */
    #[Optional(nullable: true)]
    public ?string $location;

    /**
     * The new display name to use. Set to `null` to use the default display name.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * The new username to use. Make sure to first check if it exists using our `/settings/username-exists` endpoint.
     */
    #[Optional]
    public ?string $username;

    /**
     * The new website URL to use. Must be a valid URL. Set to `null` to empty it.
     */
    #[Optional(nullable: true)]
    public ?string $website;

    /**
     * The new Amazon Wishlist URL to use. Must be a valid URL. Set to `null` to empty it.
     */
    #[Optional(nullable: true)]
    public ?string $wishlist;

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
        ?string $about = null,
        ?string $avatar = null,
        ?string $header = null,
        ?string $location = null,
        ?string $name = null,
        ?string $username = null,
        ?string $website = null,
        ?string $wishlist = null,
    ): self {
        $self = new self;

        null !== $about && $self['about'] = $about;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $header && $self['header'] = $header;
        null !== $location && $self['location'] = $location;
        null !== $name && $self['name'] = $name;
        null !== $username && $self['username'] = $username;
        null !== $website && $self['website'] = $website;
        null !== $wishlist && $self['wishlist'] = $wishlist;

        return $self;
    }

    /**
     * The new bio to use. Set to `null` to empty it.
     */
    public function withAbout(?string $about): self
    {
        $self = clone $this;
        $self['about'] = $about;

        return $self;
    }

    /**
     * The new avatar to use. Must be a `ofapi_media_` ID. Refer to our `/media/upload` endpoint on how to get this.
     */
    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    /**
     * The new header (banner) to use. Must be a `ofapi_media_` ID. Refer to our `/media/upload` endpoint on how to get this.
     */
    public function withHeader(string $header): self
    {
        $self = clone $this;
        $self['header'] = $header;

        return $self;
    }

    /**
     * The new location to use. Set to `null` to empty it.
     */
    public function withLocation(?string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * The new display name to use. Set to `null` to use the default display name.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The new username to use. Make sure to first check if it exists using our `/settings/username-exists` endpoint.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }

    /**
     * The new website URL to use. Must be a valid URL. Set to `null` to empty it.
     */
    public function withWebsite(?string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }

    /**
     * The new Amazon Wishlist URL to use. Must be a valid URL. Set to `null` to empty it.
     */
    public function withWishlist(?string $wishlist): self
    {
        $self = clone $this;
        $self['wishlist'] = $wishlist;

        return $self;
    }
}
