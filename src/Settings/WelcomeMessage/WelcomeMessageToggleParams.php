<?php

declare(strict_types=1);

namespace OnlyFansAPI\Settings\WelcomeMessage;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Enable or disable the automatic welcome message that is sent when someone subscribes.
 *
 * @see OnlyFansAPI\Services\Settings\WelcomeMessageService::toggle()
 *
 * @phpstan-type WelcomeMessageToggleParamsShape = array{enabled: bool}
 */
final class WelcomeMessageToggleParams implements BaseModel
{
    /** @use SdkModel<WelcomeMessageToggleParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether the welcome message should be enabled.
     */
    #[Required]
    public bool $enabled;

    /**
     * `new WelcomeMessageToggleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WelcomeMessageToggleParams::with(enabled: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WelcomeMessageToggleParams)->withEnabled(...)
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
    public static function with(bool $enabled): self
    {
        $self = new self;

        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Whether the welcome message should be enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }
}
