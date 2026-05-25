<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get an overview of mass messages, showing the send count and view count.
 *
 * @see OnlyFansAPI\Services\MassMessagingService::retrieveOverview()
 *
 * @phpstan-type MassMessagingRetrieveOverviewParamsShape = array{
 *   endDate?: string|null,
 *   limit?: int|null,
 *   query?: string|null,
 *   startDate?: string|null,
 * }
 */
final class MassMessagingRetrieveOverviewParams implements BaseModel
{
    /** @use SdkModel<MassMessagingRetrieveOverviewParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The latest mass message to retrieve. Keep empty to get all. MUST BE DATE AFTER `startDate`. This is also used for pagination.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Number of mass messages to return (default = 10).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Optionally, find a mass message by the message text.
     */
    #[Optional]
    public ?string $query;

    /**
     * The earliest mass message to retrieve. Keep empty to get all.
     */
    #[Optional]
    public ?string $startDate;

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
        ?string $endDate = null,
        ?int $limit = null,
        ?string $query = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $query && $self['query'] = $query;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The latest mass message to retrieve. Keep empty to get all. MUST BE DATE AFTER `startDate`. This is also used for pagination.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Number of mass messages to return (default = 10).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Optionally, find a mass message by the message text.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * The earliest mass message to retrieve. Keep empty to get all.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
