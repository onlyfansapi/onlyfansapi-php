<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse\_Meta\_Cache;
use Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse\_Meta\_Credits;

/**
 * @phpstan-import-type _CacheShape from \Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse\_Meta\_Cache
 * @phpstan-import-type _CreditsShape from \Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse\_Meta\_Credits
 *
 * @phpstan-type _MetaShape = array{
 *   _cache?: null|_Cache|_CacheShape, _credits?: null|_Credits|_CreditsShape
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
     */
    public static function with(
        _Cache|array|null $_cache = null,
        _Credits|array|null $_credits = null
    ): self {
        $self = new self;

        null !== $_cache && $self['_cache'] = $_cache;
        null !== $_credits && $self['_credits'] = $_credits;

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
}
