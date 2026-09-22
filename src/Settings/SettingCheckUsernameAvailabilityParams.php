<?php

declare(strict_types=1);

namespace OnlyFansAPI\Settings;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Check if a username is taken. Returns `false` if the username is available, `true` if it is already taken.
 *
 * @see OnlyFansAPI\Services\SettingsService::checkUsernameAvailability()
 *
 * @phpstan-type SettingCheckUsernameAvailabilityParamsShape = array{
 *   username: string
 * }
 */
final class SettingCheckUsernameAvailabilityParams implements BaseModel
{
    /** @use SdkModel<SettingCheckUsernameAvailabilityParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The username to check.
     */
    #[Required]
    public string $username;

    /**
     * `new SettingCheckUsernameAvailabilityParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingCheckUsernameAvailabilityParams::with(username: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingCheckUsernameAvailabilityParams)->withUsername(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $username): self
    {
        $self = new self;

        $self['username'] = $username;

        return $self;
    }

    /**
     * The username to check.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
