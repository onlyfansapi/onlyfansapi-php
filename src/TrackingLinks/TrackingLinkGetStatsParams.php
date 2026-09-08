<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 *           Get dashboard-style summary plus daily and monthly metrics for a specific Tracking Link.
 *           <Callout title='Important information'>
 *             - `daily_metrics` returns **incremental per-day values**, not cumulative totals.
 *             - Cumulative totals are available in the `summary` section.
 *             - Historical daily data is only available from when we began recording daily link stats.
 *             - Daily data can only be tracked from the date the account was connected to OnlyFans API; earlier periods are not available.
 *           </Callout>.
 *
 * @see OnlyFansAPI\Services\TrackingLinksService::getStats()
 *
 * @phpstan-type TrackingLinkGetStatsParamsShape = array{
 *   account: string, dateEnd?: string|null, dateStart?: string|null
 * }
 */
final class TrackingLinkGetStatsParams implements BaseModel
{
    /** @use SdkModel<TrackingLinkGetStatsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Optional stats range end date.
     */
    #[Optional]
    public ?string $dateEnd;

    /**
     * Optional stats range start date.
     */
    #[Optional]
    public ?string $dateStart;

    /**
     * `new TrackingLinkGetStatsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackingLinkGetStatsParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackingLinkGetStatsParams)->withAccount(...)
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
        string $account,
        ?string $dateEnd = null,
        ?string $dateStart = null
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $dateEnd && $self['dateEnd'] = $dateEnd;
        null !== $dateStart && $self['dateStart'] = $dateStart;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Optional stats range end date.
     */
    public function withDateEnd(string $dateEnd): self
    {
        $self = clone $this;
        $self['dateEnd'] = $dateEnd;

        return $self;
    }

    /**
     * Optional stats range start date.
     */
    public function withDateStart(string $dateStart): self
    {
        $self = clone $this;
        $self['dateStart'] = $dateStart;

        return $self;
    }
}
