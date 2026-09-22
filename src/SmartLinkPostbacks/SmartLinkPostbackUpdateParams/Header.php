<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinkPostbacks\SmartLinkPostbackUpdateParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type HeaderShape = array{name?: string|null, value?: string|null}
 */
final class Header implements BaseModel
{
    /** @use SdkModel<HeaderShape> */
    use SdkModel;

    /**
     * This field is required when <code>headers.*.value</code> is present. Must match the regex /\A[A-Za-z0-9!#$%&'*+.^_`|~-]+\z/. Must not be greater than 100 characters.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * Must not be greater than 2000 characters.
     */
    #[Optional(nullable: true)]
    public ?string $value;

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
        ?string $name = null,
        ?string $value = null
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * This field is required when <code>headers.*.value</code> is present. Must match the regex /\A[A-Za-z0-9!#$%&'*+.^_`|~-]+\z/. Must not be greater than 100 characters.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Must not be greater than 2000 characters.
     */
    public function withValue(?string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
