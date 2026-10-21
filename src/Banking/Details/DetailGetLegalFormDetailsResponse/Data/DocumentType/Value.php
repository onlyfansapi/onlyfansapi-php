<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetLegalFormDetailsResponse\Data\DocumentType;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ValueShape = array{code?: string|null, name?: string|null}
 */
final class Value implements BaseModel
{
    /** @use SdkModel<ValueShape> */
    use SdkModel;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $code = null, ?string $name = null): self
    {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
