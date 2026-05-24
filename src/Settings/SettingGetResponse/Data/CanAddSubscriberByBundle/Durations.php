<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DurationsShape = array{
 *   _12?: string|null, _3?: string|null, _6?: string|null
 * }
 */
final class Durations implements BaseModel
{
    /** @use SdkModel<DurationsShape> */
    use SdkModel;

    #[Optional('12')]
    public ?string $_12;

    #[Optional('3')]
    public ?string $_3;

    #[Optional('6')]
    public ?string $_6;

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
        ?string $_12 = null,
        ?string $_3 = null,
        ?string $_6 = null
    ): self {
        $self = new self;

        null !== $_12 && $self['_12'] = $_12;
        null !== $_3 && $self['_3'] = $_3;
        null !== $_6 && $self['_6'] = $_6;

        return $self;
    }

    public function with12(string $_12): self
    {
        $self = clone $this;
        $self['_12'] = $_12;

        return $self;
    }

    public function with3(string $_3): self
    {
        $self = clone $this;
        $self['_3'] = $_3;

        return $self;
    }

    public function with6(string $_6): self
    {
        $self = clone $this;
        $self['_6'] = $_6;

        return $self;
    }
}
