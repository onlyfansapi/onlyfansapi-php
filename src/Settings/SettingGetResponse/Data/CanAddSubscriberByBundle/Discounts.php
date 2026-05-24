<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DiscountsShape = array{
 *   _0?: string|null,
 *   _10?: string|null,
 *   _15?: string|null,
 *   _20?: string|null,
 *   _25?: string|null,
 *   _30?: string|null,
 *   _35?: string|null,
 *   _40?: string|null,
 *   _45?: string|null,
 *   _5?: string|null,
 *   _50?: string|null,
 * }
 */
final class Discounts implements BaseModel
{
    /** @use SdkModel<DiscountsShape> */
    use SdkModel;

    #[Optional('0')]
    public ?string $_0;

    #[Optional('10')]
    public ?string $_10;

    #[Optional('15')]
    public ?string $_15;

    #[Optional('20')]
    public ?string $_20;

    #[Optional('25')]
    public ?string $_25;

    #[Optional('30')]
    public ?string $_30;

    #[Optional('35')]
    public ?string $_35;

    #[Optional('40')]
    public ?string $_40;

    #[Optional('45')]
    public ?string $_45;

    #[Optional('5')]
    public ?string $_5;

    #[Optional('50')]
    public ?string $_50;

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
        ?string $_0 = null,
        ?string $_10 = null,
        ?string $_15 = null,
        ?string $_20 = null,
        ?string $_25 = null,
        ?string $_30 = null,
        ?string $_35 = null,
        ?string $_40 = null,
        ?string $_45 = null,
        ?string $_5 = null,
        ?string $_50 = null,
    ): self {
        $self = new self;

        null !== $_0 && $self['_0'] = $_0;
        null !== $_10 && $self['_10'] = $_10;
        null !== $_15 && $self['_15'] = $_15;
        null !== $_20 && $self['_20'] = $_20;
        null !== $_25 && $self['_25'] = $_25;
        null !== $_30 && $self['_30'] = $_30;
        null !== $_35 && $self['_35'] = $_35;
        null !== $_40 && $self['_40'] = $_40;
        null !== $_45 && $self['_45'] = $_45;
        null !== $_5 && $self['_5'] = $_5;
        null !== $_50 && $self['_50'] = $_50;

        return $self;
    }

    public function with0(string $_0): self
    {
        $self = clone $this;
        $self['_0'] = $_0;

        return $self;
    }

    public function with10(string $_10): self
    {
        $self = clone $this;
        $self['_10'] = $_10;

        return $self;
    }

    public function with15(string $_15): self
    {
        $self = clone $this;
        $self['_15'] = $_15;

        return $self;
    }

    public function with20(string $_20): self
    {
        $self = clone $this;
        $self['_20'] = $_20;

        return $self;
    }

    public function with25(string $_25): self
    {
        $self = clone $this;
        $self['_25'] = $_25;

        return $self;
    }

    public function with30(string $_30): self
    {
        $self = clone $this;
        $self['_30'] = $_30;

        return $self;
    }

    public function with35(string $_35): self
    {
        $self = clone $this;
        $self['_35'] = $_35;

        return $self;
    }

    public function with40(string $_40): self
    {
        $self = clone $this;
        $self['_40'] = $_40;

        return $self;
    }

    public function with45(string $_45): self
    {
        $self = clone $this;
        $self['_45'] = $_45;

        return $self;
    }

    public function with5(string $_5): self
    {
        $self = clone $this;
        $self['_5'] = $_5;

        return $self;
    }

    public function with50(string $_50): self
    {
        $self = clone $this;
        $self['_50'] = $_50;

        return $self;
    }
}
