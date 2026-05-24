<?php

declare(strict_types=1);

namespace Onlyfansapi\SavedForLater\Messages\Settings;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams\Period;

/**
 * Enable or update automatic messaging of Saved For Later messages.
 *
 * @see Onlyfansapi\Services\SavedForLater\Messages\SettingsService::enableOrUpdateAutomaticMessaging()
 *
 * @phpstan-type SettingEnableOrUpdateAutomaticMessagingParamsShape = array{
 *   period: Period|value-of<Period>
 * }
 */
final class SettingEnableOrUpdateAutomaticMessagingParams implements BaseModel
{
    /** @use SdkModel<SettingEnableOrUpdateAutomaticMessagingParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The automatic messaging interval (in hours).
     *
     * @var value-of<Period> $period
     */
    #[Required(enum: Period::class)]
    public int $period;

    /**
     * `new SettingEnableOrUpdateAutomaticMessagingParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingEnableOrUpdateAutomaticMessagingParams::with(period: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingEnableOrUpdateAutomaticMessagingParams)->withPeriod(...)
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
     *
     * @param Period|value-of<Period> $period
     */
    public static function with(Period|int $period): self
    {
        $self = new self;

        $self['period'] = $period;

        return $self;
    }

    /**
     * The automatic messaging interval (in hours).
     *
     * @param Period|value-of<Period> $period
     */
    public function withPeriod(Period|int $period): self
    {
        $self = clone $this;
        $self['period'] = $period;

        return $self;
    }
}
