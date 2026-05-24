<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Check if a username is taken. Returns `false` if the username is available, `true` if it is already taken.
 *
 * @see Onlyfansapi\Services\SettingsService::checkUsernameExists()
 *
 * @phpstan-type SettingCheckUsernameExistsParamsShape = array{username: string}
 */
final class SettingCheckUsernameExistsParams implements BaseModel
{
    /** @use SdkModel<SettingCheckUsernameExistsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The username to check.
     */
    #[Required]
    public string $username;

    /**
     * `new SettingCheckUsernameExistsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingCheckUsernameExistsParams::with(username: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingCheckUsernameExistsParams)->withUsername(...)
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
