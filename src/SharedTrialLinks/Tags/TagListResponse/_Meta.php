<?php

declare(strict_types=1);

namespace Onlyfansapi\SharedTrialLinks\Tags\TagListResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SharedTrialLinks\Tags\TagListResponse\_Meta\_Cache;
use Onlyfansapi\SharedTrialLinks\Tags\TagListResponse\_Meta\_Credits;
use Onlyfansapi\SharedTrialLinks\Tags\TagListResponse\_Meta\_RateLimits;

/**
 * @phpstan-import-type _CacheShape from \Onlyfansapi\SharedTrialLinks\Tags\TagListResponse\_Meta\_Cache
 * @phpstan-import-type _CreditsShape from \Onlyfansapi\SharedTrialLinks\Tags\TagListResponse\_Meta\_Credits
 * @phpstan-import-type _RateLimitsShape from \Onlyfansapi\SharedTrialLinks\Tags\TagListResponse\_Meta\_RateLimits
 *
 * @phpstan-type _MetaShape = array{
 *   _cache?: null|_Cache|_CacheShape,
 *   _credits?: null|_Credits|_CreditsShape,
 *   _rateLimits?: null|_RateLimits|_RateLimitsShape,
 * }
 */
final class _Meta implements BaseModel
{
    /** @use SdkModel<_MetaShape> */
    use SdkModel;

    #[Optional]
    public ?_Cache $_cache;

    #[Optional]
    public ?_Credits $_credits;

    #[Optional('_rate_limits')]
    public ?_RateLimits $_rateLimits;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param _Cache|_CacheShape|null $_cache
     * @param _Credits|_CreditsShape|null $_credits
     * @param _RateLimits|_RateLimitsShape|null $_rateLimits
     */
    public static function with(
        _Cache|array|null $_cache = null,
        _Credits|array|null $_credits = null,
        _RateLimits|array|null $_rateLimits = null,
    ): self {
        $self = new self;

        null !== $_cache && $self['_cache'] = $_cache;
        null !== $_credits && $self['_credits'] = $_credits;
        null !== $_rateLimits && $self['_rateLimits'] = $_rateLimits;

        return $self;
    }

    /**
     * @param _Cache|_CacheShape $_cache
     */
    public function withCache(_Cache|array $_cache): self
    {
        $self = clone $this;
        $self['_cache'] = $_cache;

        return $self;
    }

    /**
     * @param _Credits|_CreditsShape $_credits
     */
    public function withCredits(_Credits|array $_credits): self
    {
        $self = clone $this;
        $self['_credits'] = $_credits;

        return $self;
    }

    /**
     * @param _RateLimits|_RateLimitsShape $_rateLimits
     */
    public function withRateLimits(_RateLimits|array $_rateLimits): self
    {
        $self = clone $this;
        $self['_rateLimits'] = $_rateLimits;

        return $self;
    }
}
