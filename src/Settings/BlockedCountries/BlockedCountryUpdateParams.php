<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\BlockedCountries;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Updates the countries blocked from viewing the account.
 *
 * @see Onlyfansapi\Services\Settings\BlockedCountriesService::update()
 *
 * @phpstan-type BlockedCountryUpdateParamsShape = array{
 *   blockedCountries: list<string>, blockedStates?: list<string>|null
 * }
 */
final class BlockedCountryUpdateParams implements BaseModel
{
    /** @use SdkModel<BlockedCountryUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of all ISO 3166-1 alpha-2 country codes to block including existing ones. If you want to unblock all countries, set this to an empty array or `null`.
     *
     * @var list<string> $blockedCountries
     */
    #[Required(list: 'string')]
    public array $blockedCountries;

    /**
     * Blocked states payload forwarded to OnlyFans. Defaults to an empty array.
     *
     * @var list<string>|null $blockedStates
     */
    #[Optional(list: 'string')]
    public ?array $blockedStates;

    /**
     * `new BlockedCountryUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlockedCountryUpdateParams::with(blockedCountries: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlockedCountryUpdateParams)->withBlockedCountries(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $blockedCountries
     * @param list<string>|null $blockedStates
     */
    public static function with(
        array $blockedCountries,
        ?array $blockedStates = null
    ): self {
        $self = new self;

        $self['blockedCountries'] = $blockedCountries;

        null !== $blockedStates && $self['blockedStates'] = $blockedStates;

        return $self;
    }

    /**
     * List of all ISO 3166-1 alpha-2 country codes to block including existing ones. If you want to unblock all countries, set this to an empty array or `null`.
     *
     * @param list<string> $blockedCountries
     */
    public function withBlockedCountries(array $blockedCountries): self
    {
        $self = clone $this;
        $self['blockedCountries'] = $blockedCountries;

        return $self;
    }

    /**
     * Blocked states payload forwarded to OnlyFans. Defaults to an empty array.
     *
     * @param list<string> $blockedStates
     */
    public function withBlockedStates(array $blockedStates): self
    {
        $self = clone $this;
        $self['blockedStates'] = $blockedStates;

        return $self;
    }
}
