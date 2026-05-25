<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\Summary\SummaryGetSummaryResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryDataShape = array{
 *   contentPreferences?: string|null,
 *   familyPets?: string|null,
 *   hobbies?: string|null,
 *   interests?: string|null,
 *   kinks?: string|null,
 *   name?: string|null,
 *   otherNotes?: string|null,
 *   preferredName?: string|null,
 *   requests?: string|null,
 *   themes?: string|null,
 *   travelPlans?: string|null,
 * }
 */
final class SummaryData implements BaseModel
{
    /** @use SdkModel<SummaryDataShape> */
    use SdkModel;

    #[Optional('content_preferences')]
    public ?string $contentPreferences;

    #[Optional('family_pets')]
    public ?string $familyPets;

    #[Optional]
    public ?string $hobbies;

    #[Optional]
    public ?string $interests;

    #[Optional]
    public ?string $kinks;

    #[Optional]
    public ?string $name;

    #[Optional('other_notes')]
    public ?string $otherNotes;

    #[Optional('preferred_name')]
    public ?string $preferredName;

    #[Optional]
    public ?string $requests;

    #[Optional]
    public ?string $themes;

    #[Optional('travel_plans')]
    public ?string $travelPlans;

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
        ?string $contentPreferences = null,
        ?string $familyPets = null,
        ?string $hobbies = null,
        ?string $interests = null,
        ?string $kinks = null,
        ?string $name = null,
        ?string $otherNotes = null,
        ?string $preferredName = null,
        ?string $requests = null,
        ?string $themes = null,
        ?string $travelPlans = null,
    ): self {
        $self = new self;

        null !== $contentPreferences && $self['contentPreferences'] = $contentPreferences;
        null !== $familyPets && $self['familyPets'] = $familyPets;
        null !== $hobbies && $self['hobbies'] = $hobbies;
        null !== $interests && $self['interests'] = $interests;
        null !== $kinks && $self['kinks'] = $kinks;
        null !== $name && $self['name'] = $name;
        null !== $otherNotes && $self['otherNotes'] = $otherNotes;
        null !== $preferredName && $self['preferredName'] = $preferredName;
        null !== $requests && $self['requests'] = $requests;
        null !== $themes && $self['themes'] = $themes;
        null !== $travelPlans && $self['travelPlans'] = $travelPlans;

        return $self;
    }

    public function withContentPreferences(string $contentPreferences): self
    {
        $self = clone $this;
        $self['contentPreferences'] = $contentPreferences;

        return $self;
    }

    public function withFamilyPets(string $familyPets): self
    {
        $self = clone $this;
        $self['familyPets'] = $familyPets;

        return $self;
    }

    public function withHobbies(string $hobbies): self
    {
        $self = clone $this;
        $self['hobbies'] = $hobbies;

        return $self;
    }

    public function withInterests(string $interests): self
    {
        $self = clone $this;
        $self['interests'] = $interests;

        return $self;
    }

    public function withKinks(string $kinks): self
    {
        $self = clone $this;
        $self['kinks'] = $kinks;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOtherNotes(string $otherNotes): self
    {
        $self = clone $this;
        $self['otherNotes'] = $otherNotes;

        return $self;
    }

    public function withPreferredName(string $preferredName): self
    {
        $self = clone $this;
        $self['preferredName'] = $preferredName;

        return $self;
    }

    public function withRequests(string $requests): self
    {
        $self = clone $this;
        $self['requests'] = $requests;

        return $self;
    }

    public function withThemes(string $themes): self
    {
        $self = clone $this;
        $self['themes'] = $themes;

        return $self;
    }

    public function withTravelPlans(string $travelPlans): self
    {
        $self = clone $this;
        $self['travelPlans'] = $travelPlans;

        return $self;
    }
}
