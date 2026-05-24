<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get dashboard-style summary plus daily and monthly metrics for a specific Free Trial Link.
 *
 * @see Onlyfansapi\Services\TrialLinksService::retrieveStats()
 *
 * @phpstan-type TrialLinkRetrieveStatsParamsShape = array{
 *   account: string, dateEnd?: string|null, dateStart?: string|null
 * }
 */
final class TrialLinkRetrieveStatsParams implements BaseModel
{
    /** @use SdkModel<TrialLinkRetrieveStatsParamsShape> */
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
     * `new TrialLinkRetrieveStatsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkRetrieveStatsParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkRetrieveStatsParams)->withAccount(...)
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
