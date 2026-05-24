<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\FirstName;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type LabelShape = array{key?: string|null}
 */
final class Label implements BaseModel
{
    /** @use SdkModel<LabelShape> */
    use SdkModel;

    #[Optional]
    public ?string $key;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $key = null): self
    {
        $self = new self;

        null !== $key && $self['key'] = $key;

        return $self;
    }

    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }
}
