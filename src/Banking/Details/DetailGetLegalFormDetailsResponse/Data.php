<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse;

use Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse\Data\DocumentType;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DocumentTypeShape from \Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse\Data\DocumentType
 *
 * @phpstan-type DataShape = array{
 *   dateOfBirth?: string|null,
 *   documentType?: null|DocumentType|DocumentTypeShape,
 *   isAllowedDl?: bool|null,
 *   privateWebsite?: string|null,
 *   realAddress?: string|null,
 *   realBusinessName?: string|null,
 *   realCity?: string|null,
 *   realFirstName?: string|null,
 *   realInstagram?: string|null,
 *   realLastName?: string|null,
 *   realPostal?: string|null,
 *   realState?: string|null,
 *   realTwitter?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $dateOfBirth;

    #[Optional]
    public ?DocumentType $documentType;

    #[Optional('isAllowedDL')]
    public ?bool $isAllowedDl;

    #[Optional]
    public ?string $privateWebsite;

    #[Optional]
    public ?string $realAddress;

    #[Optional]
    public ?string $realBusinessName;

    #[Optional]
    public ?string $realCity;

    #[Optional]
    public ?string $realFirstName;

    #[Optional]
    public ?string $realInstagram;

    #[Optional]
    public ?string $realLastName;

    #[Optional]
    public ?string $realPostal;

    #[Optional]
    public ?string $realState;

    #[Optional]
    public ?string $realTwitter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocumentType|DocumentTypeShape|null $documentType
     */
    public static function with(
        ?string $dateOfBirth = null,
        DocumentType|array|null $documentType = null,
        ?bool $isAllowedDl = null,
        ?string $privateWebsite = null,
        ?string $realAddress = null,
        ?string $realBusinessName = null,
        ?string $realCity = null,
        ?string $realFirstName = null,
        ?string $realInstagram = null,
        ?string $realLastName = null,
        ?string $realPostal = null,
        ?string $realState = null,
        ?string $realTwitter = null,
    ): self {
        $self = new self;

        null !== $dateOfBirth && $self['dateOfBirth'] = $dateOfBirth;
        null !== $documentType && $self['documentType'] = $documentType;
        null !== $isAllowedDl && $self['isAllowedDl'] = $isAllowedDl;
        null !== $privateWebsite && $self['privateWebsite'] = $privateWebsite;
        null !== $realAddress && $self['realAddress'] = $realAddress;
        null !== $realBusinessName && $self['realBusinessName'] = $realBusinessName;
        null !== $realCity && $self['realCity'] = $realCity;
        null !== $realFirstName && $self['realFirstName'] = $realFirstName;
        null !== $realInstagram && $self['realInstagram'] = $realInstagram;
        null !== $realLastName && $self['realLastName'] = $realLastName;
        null !== $realPostal && $self['realPostal'] = $realPostal;
        null !== $realState && $self['realState'] = $realState;
        null !== $realTwitter && $self['realTwitter'] = $realTwitter;

        return $self;
    }

    public function withDateOfBirth(string $dateOfBirth): self
    {
        $self = clone $this;
        $self['dateOfBirth'] = $dateOfBirth;

        return $self;
    }

    /**
     * @param DocumentType|DocumentTypeShape $documentType
     */
    public function withDocumentType(DocumentType|array $documentType): self
    {
        $self = clone $this;
        $self['documentType'] = $documentType;

        return $self;
    }

    public function withIsAllowedDl(bool $isAllowedDl): self
    {
        $self = clone $this;
        $self['isAllowedDl'] = $isAllowedDl;

        return $self;
    }

    public function withPrivateWebsite(string $privateWebsite): self
    {
        $self = clone $this;
        $self['privateWebsite'] = $privateWebsite;

        return $self;
    }

    public function withRealAddress(string $realAddress): self
    {
        $self = clone $this;
        $self['realAddress'] = $realAddress;

        return $self;
    }

    public function withRealBusinessName(string $realBusinessName): self
    {
        $self = clone $this;
        $self['realBusinessName'] = $realBusinessName;

        return $self;
    }

    public function withRealCity(string $realCity): self
    {
        $self = clone $this;
        $self['realCity'] = $realCity;

        return $self;
    }

    public function withRealFirstName(string $realFirstName): self
    {
        $self = clone $this;
        $self['realFirstName'] = $realFirstName;

        return $self;
    }

    public function withRealInstagram(string $realInstagram): self
    {
        $self = clone $this;
        $self['realInstagram'] = $realInstagram;

        return $self;
    }

    public function withRealLastName(string $realLastName): self
    {
        $self = clone $this;
        $self['realLastName'] = $realLastName;

        return $self;
    }

    public function withRealPostal(string $realPostal): self
    {
        $self = clone $this;
        $self['realPostal'] = $realPostal;

        return $self;
    }

    public function withRealState(string $realState): self
    {
        $self = clone $this;
        $self['realState'] = $realState;

        return $self;
    }

    public function withRealTwitter(string $realTwitter): self
    {
        $self = clone $this;
        $self['realTwitter'] = $realTwitter;

        return $self;
    }
}
