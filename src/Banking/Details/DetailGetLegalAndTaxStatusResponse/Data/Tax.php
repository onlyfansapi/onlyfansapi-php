<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetLegalAndTaxStatusResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type TaxShape = array{
 *   countryCode?: string|null, editable?: bool|null, isBankingDisabled?: bool|null
 * }
 */
final class Tax implements BaseModel
{
    /** @use SdkModel<TaxShape> */
    use SdkModel;

    #[Optional]
    public ?string $countryCode;

    #[Optional]
    public ?bool $editable;

    #[Optional]
    public ?bool $isBankingDisabled;

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
        ?string $countryCode = null,
        ?bool $editable = null,
        ?bool $isBankingDisabled = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $editable && $self['editable'] = $editable;
        null !== $isBankingDisabled && $self['isBankingDisabled'] = $isBankingDisabled;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withEditable(bool $editable): self
    {
        $self = clone $this;
        $self['editable'] = $editable;

        return $self;
    }

    public function withIsBankingDisabled(bool $isBankingDisabled): self
    {
        $self = clone $this;
        $self['isBankingDisabled'] = $isBankingDisabled;

        return $self;
    }
}
