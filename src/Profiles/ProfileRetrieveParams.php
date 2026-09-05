<?php

declare(strict_types=1);

namespace OnlyFansAPI\Profiles;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get profile details by username.
 *
 * @see OnlyFansAPI\Services\ProfilesService::retrieve()
 *
 * @phpstan-type ProfileRetrieveParamsShape = array{fresh?: bool|null}
 */
final class ProfileRetrieveParams implements BaseModel
{
    /** @use SdkModel<ProfileRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * If `true` then OnlyFansAPI will always return the real time information about profile (eg. when was the profile last online).
     */
    #[Optional(nullable: true)]
    public ?bool $fresh;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $fresh = null): self
    {
        $self = new self;

        null !== $fresh && $self['fresh'] = $fresh;

        return $self;
    }

    /**
     * If `true` then OnlyFansAPI will always return the real time information about profile (eg. when was the profile last online).
     */
    public function withFresh(?bool $fresh): self
    {
        $self = clone $this;
        $self['fresh'] = $fresh;

        return $self;
    }
}
