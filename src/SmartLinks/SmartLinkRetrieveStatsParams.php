<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get dashboard-style summary plus daily and monthly metrics for a specific Smart Link on the current team.
 *
 * @see OnlyFansAPI\Services\SmartLinksService::retrieveStats()
 *
 * @phpstan-type SmartLinkRetrieveStatsParamsShape = array{
 *   dateEnd?: string|null, dateStart?: string|null
 * }
 */
final class SmartLinkRetrieveStatsParams implements BaseModel
{
    /** @use SdkModel<SmartLinkRetrieveStatsParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?string $dateEnd = null,
        ?string $dateStart = null
    ): self {
        $self = new self;

        null !== $dateEnd && $self['dateEnd'] = $dateEnd;
        null !== $dateStart && $self['dateStart'] = $dateStart;

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
