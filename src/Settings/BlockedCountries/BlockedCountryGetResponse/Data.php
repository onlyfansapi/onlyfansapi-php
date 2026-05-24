<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\BlockedCountries\BlockedCountryGetResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{blockedCountries?: list<string>|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<string>|null $blockedCountries */
    #[Optional(list: 'string')]
    public ?array $blockedCountries;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $blockedCountries
     */
    public static function with(?array $blockedCountries = null): self
    {
        $self = new self;

        null !== $blockedCountries && $self['blockedCountries'] = $blockedCountries;

        return $self;
    }

    /**
     * @param list<string> $blockedCountries
     */
    public function withBlockedCountries(array $blockedCountries): self
    {
        $self = clone $this;
        $self['blockedCountries'] = $blockedCountries;

        return $self;
    }
}
