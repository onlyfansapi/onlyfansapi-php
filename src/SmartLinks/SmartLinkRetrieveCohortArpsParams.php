<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SmartLinks\SmartLinkRetrieveCohortArpsParams\RevenueBasis;

/**
 * Get per-link time-to-profit cohort ARPS windows for a specific Smart Link.
 *
 * @see Onlyfansapi\Services\SmartLinksService::retrieveCohortArps()
 *
 * @phpstan-type SmartLinkRetrieveCohortArpsParamsShape = array{
 *   acquisitionEnd?: string|null,
 *   acquisitionStart?: string|null,
 *   revenueBasis?: null|RevenueBasis|value-of<RevenueBasis>,
 * }
 */
final class SmartLinkRetrieveCohortArpsParams implements BaseModel
{
    /** @use SdkModel<SmartLinkRetrieveCohortArpsParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?string $acquisitionEnd = null,
        ?string $acquisitionStart = null,
        RevenueBasis|string|null $revenueBasis = null,
    ): self {
        $self = new self;

        null !== $acquisitionEnd && $self['acquisitionEnd'] = $acquisitionEnd;
        null !== $acquisitionStart && $self['acquisitionStart'] = $acquisitionStart;
        null !== $revenueBasis && $self['revenueBasis'] = $revenueBasis;

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
