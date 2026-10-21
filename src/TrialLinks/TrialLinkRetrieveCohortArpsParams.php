<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\TrialLinks\TrialLinkRetrieveCohortArpsParams\RevenueBasis;

/**
 * Get per-link time-to-profit cohort ARPS windows for a specific Free Trial Link.
 *
 * @see OnlyFansAPI\Services\TrialLinksService::retrieveCohortArps()
 *
 * @phpstan-type TrialLinkRetrieveCohortArpsParamsShape = array{
 *   account: string,
 *   acquisitionEnd?: string|null,
 *   acquisitionStart?: string|null,
 *   revenueBasis?: null|RevenueBasis|value-of<RevenueBasis>,
 * }
 */
final class TrialLinkRetrieveCohortArpsParams implements BaseModel
{
    /** @use SdkModel<TrialLinkRetrieveCohortArpsParamsShape> */
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
     * `new TrialLinkRetrieveCohortArpsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkRetrieveCohortArpsParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkRetrieveCohortArpsParams)->withAccount(...)
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
