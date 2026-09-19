<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

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
