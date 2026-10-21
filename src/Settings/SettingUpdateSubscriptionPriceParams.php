<?php

declare(strict_types=1);

namespace OnlyFansAPI\Settings;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Update the account subscription price. Send `0` or `"free"` to make the account free. ⚠️ WARNING! OnlyFans limits updating the subscription price to max. 3 times per day.
 *
 * @see OnlyFansAPI\Services\SettingsService::updateSubscriptionPrice()
 *
 * @phpstan-type SettingUpdateSubscriptionPriceParamsShape = array{price: string}
 */
final class SettingUpdateSubscriptionPriceParams implements BaseModel
{
    /** @use SdkModel<SettingUpdateSubscriptionPriceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The new subscription price. Accepts `0`, `"free"`, or a number between 4.99 and 200.
     */
    #[Required]
    public string $price;

    /**
     * `new SettingUpdateSubscriptionPriceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingUpdateSubscriptionPriceParams::with(price: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingUpdateSubscriptionPriceParams)->withPrice(...)
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
    public static function with(string $price): self
    {
        $self = new self;

        $self['price'] = $price;

        return $self;
    }

    /**
     * The new subscription price. Accepts `0`, `"free"`, or a number between 4.99 and 200.
     */
    public function withPrice(string $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }
}
