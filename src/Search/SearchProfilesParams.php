<?php

declare(strict_types=1);

namespace Onlyfansapi\Search;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Full-text search for profiles with filters for pricing, free trials, location, media count and more.
 *
 * @see Onlyfansapi\Services\SearchService::profiles()
 *
 * @phpstan-type SearchProfilesParamsShape = array{
 *   query: string,
 *   limit?: string|null,
 *   location?: string|null,
 *   maxSubscribePrice?: string|null,
 *   minSubscribePrice?: string|null,
 * }
 */
final class SearchProfilesParams implements BaseModel
{
    /** @use SdkModel<SearchProfilesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Query for full text search in username, display name, bio.
     */
    #[Required]
    public string $query;

    /**
     * The number of profiles to return. For each returned profile we charge your account 1 credit. Default: `10`.
     */
    #[Optional]
    public ?string $limit;

    /**
     * Location.
     */
    #[Optional]
    public ?string $location;

    /**
     * Maximum subscribe price.
     */
    #[Optional]
    public ?string $maxSubscribePrice;

    /**
     * Minimum subscribe price.
     */
    #[Optional]
    public ?string $minSubscribePrice;

    /**
     * `new SearchProfilesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SearchProfilesParams::with(query: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SearchProfilesParams)->withQuery(...)
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
     */
    public static function with(
        string $query,
        ?string $limit = null,
        ?string $location = null,
        ?string $maxSubscribePrice = null,
        ?string $minSubscribePrice = null,
    ): self {
        $self = new self;

        $self['query'] = $query;

        null !== $limit && $self['limit'] = $limit;
        null !== $location && $self['location'] = $location;
        null !== $maxSubscribePrice && $self['maxSubscribePrice'] = $maxSubscribePrice;
        null !== $minSubscribePrice && $self['minSubscribePrice'] = $minSubscribePrice;

        return $self;
    }

    /**
     * Query for full text search in username, display name, bio.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * The number of profiles to return. For each returned profile we charge your account 1 credit. Default: `10`.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Location.
     */
    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * Maximum subscribe price.
     */
    public function withMaxSubscribePrice(string $maxSubscribePrice): self
    {
        $self = clone $this;
        $self['maxSubscribePrice'] = $maxSubscribePrice;

        return $self;
    }

    /**
     * Minimum subscribe price.
     */
    public function withMinSubscribePrice(string $minSubscribePrice): self
    {
        $self = clone $this;
        $self['minSubscribePrice'] = $minSubscribePrice;

        return $self;
    }
}
