<?php

declare(strict_types=1);

namespace OnlyFansAPI\SavedForLater\Posts\Settings;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams\Period;

/**
 * Enable or update automatic posting of Saved For Later posts.
 *
 * @see OnlyFansAPI\Services\SavedForLater\Posts\SettingsService::enableOrUpdateAutomaticPosting()
 *
 * @phpstan-type SettingEnableOrUpdateAutomaticPostingParamsShape = array{
 *   period: Period|value-of<Period>
 * }
 */
final class SettingEnableOrUpdateAutomaticPostingParams implements BaseModel
{
    /** @use SdkModel<SettingEnableOrUpdateAutomaticPostingParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The automatic posting interval (in hours).
     *
     * @var value-of<Period> $period
     */
    #[Required(enum: Period::class)]
    public int $period;

    /**
     * `new SettingEnableOrUpdateAutomaticPostingParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingEnableOrUpdateAutomaticPostingParams::with(period: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingEnableOrUpdateAutomaticPostingParams)->withPeriod(...)
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
     * The automatic posting interval (in hours).
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
