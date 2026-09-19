<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetDac7FormDetailsResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   address?: string|null,
 *   city?: string|null,
 *   cityOfBirth?: string|null,
 *   countryID?: int|null,
 *   countryOfBirthID?: int|null,
 *   countryOfResidenceID?: int|null,
 *   dob?: string|null,
 *   firstName?: string|null,
 *   issuingCountryID?: int|null,
 *   lastName?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   taxID?: string|null,
 *   type?: string|null,
 *   vatNumber?: string|null,
 *   zip?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $address;

    #[Optional]
    public ?string $city;

    #[Optional]
    public ?string $cityOfBirth;

    #[Optional('countryId')]
    public ?int $countryID;

    #[Optional('countryOfBirthId')]
    public ?int $countryOfBirthID;

    #[Optional('countryOfResidenceId')]
    public ?int $countryOfResidenceID;

    #[Optional('DOB')]
    public ?string $dob;

    #[Optional]
    public ?string $firstName;

    #[Optional('issuingCountryId')]
    public ?int $issuingCountryID;

    #[Optional]
    public ?string $lastName;

    #[Optional]
    public ?string $state;

    #[Optional]
    public ?string $status;

    #[Optional('taxId')]
    public ?string $taxID;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?string $vatNumber;

    #[Optional]
    public ?string $zip;

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
        ?string $address = null,
        ?string $city = null,
        ?string $cityOfBirth = null,
        ?int $countryID = null,
        ?int $countryOfBirthID = null,
        ?int $countryOfResidenceID = null,
        ?string $dob = null,
        ?string $firstName = null,
        ?int $issuingCountryID = null,
        ?string $lastName = null,
        ?string $state = null,
        ?string $status = null,
        ?string $taxID = null,
        ?string $type = null,
        ?string $vatNumber = null,
        ?string $zip = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $city && $self['city'] = $city;
        null !== $cityOfBirth && $self['cityOfBirth'] = $cityOfBirth;
        null !== $countryID && $self['countryID'] = $countryID;
        null !== $countryOfBirthID && $self['countryOfBirthID'] = $countryOfBirthID;
        null !== $countryOfResidenceID && $self['countryOfResidenceID'] = $countryOfResidenceID;
        null !== $dob && $self['dob'] = $dob;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $issuingCountryID && $self['issuingCountryID'] = $issuingCountryID;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $taxID && $self['taxID'] = $taxID;
        null !== $type && $self['type'] = $type;
        null !== $vatNumber && $self['vatNumber'] = $vatNumber;
        null !== $zip && $self['zip'] = $zip;

        return $self;
    }

    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withCityOfBirth(string $cityOfBirth): self
    {
        $self = clone $this;
        $self['cityOfBirth'] = $cityOfBirth;

        return $self;
    }

    public function withCountryID(int $countryID): self
    {
        $self = clone $this;
        $self['countryID'] = $countryID;

        return $self;
    }

    public function withCountryOfBirthID(int $countryOfBirthID): self
    {
        $self = clone $this;
        $self['countryOfBirthID'] = $countryOfBirthID;

        return $self;
    }

    public function withCountryOfResidenceID(int $countryOfResidenceID): self
    {
        $self = clone $this;
        $self['countryOfResidenceID'] = $countryOfResidenceID;

        return $self;
    }

    public function withDob(string $dob): self
    {
        $self = clone $this;
        $self['dob'] = $dob;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withIssuingCountryID(int $issuingCountryID): self
    {
        $self = clone $this;
        $self['issuingCountryID'] = $issuingCountryID;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTaxID(string $taxID): self
    {
        $self = clone $this;
        $self['taxID'] = $taxID;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withVatNumber(string $vatNumber): self
    {
        $self = clone $this;
        $self['vatNumber'] = $vatNumber;

        return $self;
    }

    public function withZip(string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
