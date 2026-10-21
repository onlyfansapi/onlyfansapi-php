<?php

declare(strict_types=1);

namespace OnlyFansAPI\Search\SearchProfilesParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Search\SearchProfilesParams\Filter\Gender;

/**
 * @phpstan-type FilterShape = array{gender?: null|Gender|value-of<Gender>}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by gender (available: `female`, `male`, `trans`, `trans_ftm` (Female-to-Male), `trans_mft` (Male-to-Female), `couple`). ⭐️ Only available on the Pro and Enterprise plan.
     *
     * @var value-of<Gender>|null $gender
     */
    #[Optional(enum: Gender::class)]
    public ?string $gender;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Gender|value-of<Gender>|null $gender
     */
    public static function with(Gender|string|null $gender = null): self
    {
        $self = new self;

        null !== $gender && $self['gender'] = $gender;

        return $self;
    }

    /**
     * Filter by gender (available: `female`, `male`, `trans`, `trans_ftm` (Female-to-Male), `trans_mft` (Male-to-Female), `couple`). ⭐️ Only available on the Pro and Enterprise plan.
     *
     * @param Gender|value-of<Gender> $gender
     */
    public function withGender(Gender|string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }
}
