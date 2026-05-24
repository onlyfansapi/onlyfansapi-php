<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\TrackingLinks\TrackingLinkGetCohortArpsParams\RevenueBasis;

/**
 * Get per-link time-to-profit cohort ARPS windows for a specific Tracking Link.
 *
 * @see Onlyfansapi\Services\TrackingLinksService::getCohortArps()
 *
 * @phpstan-type TrackingLinkGetCohortArpsParamsShape = array{
 *   account: string,
 *   acquisitionEnd?: string|null,
 *   acquisitionStart?: string|null,
 *   revenueBasis?: null|RevenueBasis|value-of<RevenueBasis>,
 * }
 */
final class TrackingLinkGetCohortArpsParams implements BaseModel
{
    /** @use SdkModel<TrackingLinkGetCohortArpsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Optional acquisition range end date.
     */
    #[Optional]
    public ?string $acquisitionEnd;

    /**
     * Optional acquisition range start date.
     */
    #[Optional]
    public ?string $acquisitionStart;

    /**
     * Revenue basis. Defaults to `net`.
     *
     * @var value-of<RevenueBasis>|null $revenueBasis
     */
    #[Optional(enum: RevenueBasis::class)]
    public ?string $revenueBasis;

    /**
     * `new TrackingLinkGetCohortArpsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackingLinkGetCohortArpsParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackingLinkGetCohortArpsParams)->withAccount(...)
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
     * @param RevenueBasis|value-of<RevenueBasis>|null $revenueBasis
     */
    public static function with(
        string $account,
        ?string $acquisitionEnd = null,
        ?string $acquisitionStart = null,
        RevenueBasis|string|null $revenueBasis = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $acquisitionEnd && $self['acquisitionEnd'] = $acquisitionEnd;
        null !== $acquisitionStart && $self['acquisitionStart'] = $acquisitionStart;
        null !== $revenueBasis && $self['revenueBasis'] = $revenueBasis;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Optional acquisition range end date.
     */
    public function withAcquisitionEnd(string $acquisitionEnd): self
    {
        $self = clone $this;
        $self['acquisitionEnd'] = $acquisitionEnd;

        return $self;
    }

    /**
     * Optional acquisition range start date.
     */
    public function withAcquisitionStart(string $acquisitionStart): self
    {
        $self = clone $this;
        $self['acquisitionStart'] = $acquisitionStart;

        return $self;
    }

    /**
     * Revenue basis. Defaults to `net`.
     *
     * @param RevenueBasis|value-of<RevenueBasis> $revenueBasis
     */
    public function withRevenueBasis(RevenueBasis|string $revenueBasis): self
    {
        $self = clone $this;
        $self['revenueBasis'] = $revenueBasis;

        return $self;
    }
}
