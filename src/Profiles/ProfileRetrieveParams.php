<?php

declare(strict_types=1);

namespace Onlyfansapi\Profiles;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get profile details by username.
 *
 * @see Onlyfansapi\Services\ProfilesService::retrieve()
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
