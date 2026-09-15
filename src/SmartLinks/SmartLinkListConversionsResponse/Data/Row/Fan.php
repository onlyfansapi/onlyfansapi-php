<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data\Row;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FanShape = array{
 *   avatarURL?: string|null,
 *   name?: string|null,
 *   onlyfansID?: string|null,
 *   onlyfansURL?: string|null,
 *   username?: string|null,
 * }
 */
final class Fan implements BaseModel
{
    /** @use SdkModel<FanShape> */
    use SdkModel;

    #[Optional('avatar_url')]
    public ?string $avatarURL;

    #[Optional]
    public ?string $name;

    #[Optional('onlyfans_id')]
    public ?string $onlyfansID;

    #[Optional('onlyfans_url')]
    public ?string $onlyfansURL;

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
        ?string $avatarURL = null,
        ?string $name = null,
        ?string $onlyfansID = null,
        ?string $onlyfansURL = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $avatarURL && $self['avatarURL'] = $avatarURL;
        null !== $name && $self['name'] = $name;
        null !== $onlyfansID && $self['onlyfansID'] = $onlyfansID;
        null !== $onlyfansURL && $self['onlyfansURL'] = $onlyfansURL;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withAvatarURL(string $avatarURL): self
    {
        $self = clone $this;
        $self['avatarURL'] = $avatarURL;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOnlyfansID(string $onlyfansID): self
    {
        $self = clone $this;
        $self['onlyfansID'] = $onlyfansID;

        return $self;
    }

    public function withOnlyfansURL(string $onlyfansURL): self
    {
        $self = clone $this;
        $self['onlyfansURL'] = $onlyfansURL;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
