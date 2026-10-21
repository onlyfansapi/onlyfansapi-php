<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout;

use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Address;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\BankName;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Bic;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\City;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Country;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\FirstName;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Iban;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Postal;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AddressShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Address
 * @phpstan-import-type BankNameShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\BankName
 * @phpstan-import-type BicShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Bic
 * @phpstan-import-type CityShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\City
 * @phpstan-import-type CountryShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Country
 * @phpstan-import-type FirstNameShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\FirstName
 * @phpstan-import-type IbanShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Iban
 * @phpstan-import-type LastNameShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName
 * @phpstan-import-type PostalShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Postal
 *
 * @phpstan-type FieldsShape = array{
 *   address?: null|Address|AddressShape,
 *   bankName?: null|BankName|BankNameShape,
 *   bic?: null|Bic|BicShape,
 *   city?: null|City|CityShape,
 *   country?: null|Country|CountryShape,
 *   firstName?: null|FirstName|FirstNameShape,
 *   iban?: null|Iban|IbanShape,
 *   lastName?: null|LastName|LastNameShape,
 *   postal?: null|Postal|PostalShape,
 * }
 */
final class Fields implements BaseModel
{
    /** @use SdkModel<FieldsShape> */
    use SdkModel;

    #[Optional]
    public ?Address $address;

    #[Optional('bank_name')]
    public ?BankName $bankName;

    #[Optional]
    public ?Bic $bic;

    #[Optional]
    public ?City $city;

    #[Optional]
    public ?Country $country;

    #[Optional('first_name')]
    public ?FirstName $firstName;

    #[Optional]
    public ?Iban $iban;

    #[Optional('last_name')]
    public ?LastName $lastName;

    #[Optional]
    public ?Postal $postal;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Address|AddressShape|null $address
     * @param BankName|BankNameShape|null $bankName
     * @param Bic|BicShape|null $bic
     * @param City|CityShape|null $city
     * @param Country|CountryShape|null $country
     * @param FirstName|FirstNameShape|null $firstName
     * @param Iban|IbanShape|null $iban
     * @param LastName|LastNameShape|null $lastName
     * @param Postal|PostalShape|null $postal
     */
    public static function with(
        Address|array|null $address = null,
        BankName|array|null $bankName = null,
        Bic|array|null $bic = null,
        City|array|null $city = null,
        Country|array|null $country = null,
        FirstName|array|null $firstName = null,
        Iban|array|null $iban = null,
        LastName|array|null $lastName = null,
        Postal|array|null $postal = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $bankName && $self['bankName'] = $bankName;
        null !== $bic && $self['bic'] = $bic;
        null !== $city && $self['city'] = $city;
        null !== $country && $self['country'] = $country;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $iban && $self['iban'] = $iban;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $postal && $self['postal'] = $postal;

        return $self;
    }

    /**
     * @param Address|AddressShape $address
     */
    public function withAddress(Address|array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * @param BankName|BankNameShape $bankName
     */
    public function withBankName(BankName|array $bankName): self
    {
        $self = clone $this;
        $self['bankName'] = $bankName;

        return $self;
    }

    /**
     * @param Bic|BicShape $bic
     */
    public function withBic(Bic|array $bic): self
    {
        $self = clone $this;
        $self['bic'] = $bic;

        return $self;
    }

    /**
     * @param City|CityShape $city
     */
    public function withCity(City|array $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * @param Country|CountryShape $country
     */
    public function withCountry(Country|array $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * @param FirstName|FirstNameShape $firstName
     */
    public function withFirstName(FirstName|array $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * @param Iban|IbanShape $iban
     */
    public function withIban(Iban|array $iban): self
    {
        $self = clone $this;
        $self['iban'] = $iban;

        return $self;
    }

    /**
     * @param LastName|LastNameShape $lastName
     */
    public function withLastName(LastName|array $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * @param Postal|PostalShape $postal
     */
    public function withPostal(Postal|array $postal): self
    {
        $self = clone $this;
        $self['postal'] = $postal;

        return $self;
    }
}
