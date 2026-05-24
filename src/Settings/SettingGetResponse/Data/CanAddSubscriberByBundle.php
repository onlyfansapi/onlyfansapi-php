<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SettingGetResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle\Discounts;
use Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle\Durations;

/**
 * @phpstan-import-type DiscountsShape from \Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle\Discounts
 * @phpstan-import-type DurationsShape from \Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle\Durations
 *
 * @phpstan-type CanAddSubscriberByBundleShape = array{
 *   discounts?: null|Discounts|DiscountsShape,
 *   durations?: null|Durations|DurationsShape,
 * }
 */
final class CanAddSubscriberByBundle implements BaseModel
{
    /** @use SdkModel<CanAddSubscriberByBundleShape> */
    use SdkModel;

    #[Optional]
    public ?Discounts $discounts;

    #[Optional]
    public ?Durations $durations;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Discounts|DiscountsShape|null $discounts
     * @param Durations|DurationsShape|null $durations
     */
    public static function with(
        Discounts|array|null $discounts = null,
        Durations|array|null $durations = null
    ): self {
        $self = new self;

        null !== $discounts && $self['discounts'] = $discounts;
        null !== $durations && $self['durations'] = $durations;

        return $self;
    }

    /**
     * @param Discounts|DiscountsShape $discounts
     */
    public function withDiscounts(Discounts|array $discounts): self
    {
        $self = clone $this;
        $self['discounts'] = $discounts;

        return $self;
    }

    /**
     * @param Durations|DurationsShape $durations
     */
    public function withDurations(Durations|array $durations): self
    {
        $self = clone $this;
        $self['durations'] = $durations;

        return $self;
    }
}
