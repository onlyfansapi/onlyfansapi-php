<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get a paginated list fans, filterable by total, only new subscribers, or only renewals. Newest fans are first.
 *
 * @see Onlyfansapi\Services\FansService::listLatest()
 *
 * @phpstan-type FanListLatestParamsShape = array{
 *   endDate?: string|null,
 *   limit?: string|null,
 *   offset?: string|null,
 *   startDate?: string|null,
 *   type?: string|null,
 * }
 */
final class FanListLatestParams implements BaseModel
{
    /** @use SdkModel<FanListLatestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End date for filtering (required with start_date).
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * Number of fans to return (1-100).
     */
    #[Optional(nullable: true)]
    public ?string $limit;

    /**
     * Number of fans to skip.
     */
    #[Optional(nullable: true)]
    public ?string $offset;

    /**
     * Start date for filtering (required with end_date).
     */
    #[Optional(nullable: true)]
    public ?string $startDate;

    /**
     * Filter by type: total, renew, or new.
     */
    #[Optional(nullable: true)]
    public ?string $type;

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
        ?string $limit = null,
        ?string $offset = null,
        ?string $startDate = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * End date for filtering (required with start_date).
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Number of fans to return (1-100).
     */
    public function withLimit(?string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of fans to skip.
     */
    public function withOffset(?string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Start date for filtering (required with end_date).
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Filter by type: total, renew, or new.
     */
    public function withType(?string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
