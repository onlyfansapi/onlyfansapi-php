<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type Dac7Shape = array{
 *   countryIDs?: list<int>|null,
 *   error?: string|null,
 *   required?: bool|null,
 *   state?: string|null,
 *   type?: string|null,
 * }
 */
final class Dac7 implements BaseModel
{
    /** @use SdkModel<Dac7Shape> */
    use SdkModel;

    /** @var list<int>|null $countryIDs */
    #[Optional('countryIds', list: 'int')]
    public ?array $countryIDs;

    #[Optional]
    public ?string $error;

    #[Optional]
    public ?bool $required;

    #[Optional]
    public ?string $state;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $countryIDs
     */
    public static function with(
        ?array $countryIDs = null,
        ?string $error = null,
        ?bool $required = null,
        ?string $state = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $countryIDs && $self['countryIDs'] = $countryIDs;
        null !== $error && $self['error'] = $error;
        null !== $required && $self['required'] = $required;
        null !== $state && $self['state'] = $state;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<int> $countryIDs
     */
    public function withCountryIDs(array $countryIDs): self
    {
        $self = clone $this;
        $self['countryIDs'] = $countryIDs;

        return $self;
    }

    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
