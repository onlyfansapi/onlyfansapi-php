<?php

declare(strict_types=1);

namespace Onlyfansapi\Chargebacks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Retrieve a list of chargebacks within a specified date range. Possible statuses are `loading`, `done`, `undo`.
 *
 * @see Onlyfansapi\Services\ChargebacksService::list()
 *
 * @phpstan-type ChargebackListParamsShape = array{
 *   endDate?: string|null,
 *   limit?: string|null,
 *   offset?: string|null,
 *   startDate?: string|null,
 * }
 */
final class ChargebackListParams implements BaseModel
{
    /** @use SdkModel<ChargebackListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the chargebacks. Keep empty to get all.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Number of chargebacks to return (1-100). Default = 10.
     */
    #[Optional(nullable: true)]
    public ?string $limit;

    /**
     * Number of chargebacks to skip, used for pagination.
     */
    #[Optional(nullable: true)]
    public ?string $offset;

    /**
     * The start date for the chargebacks. Keep empty to get all.
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
        ?string $limit = null,
        ?string $offset = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The end date for the chargebacks. Keep empty to get all.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Number of chargebacks to return (1-100). Default = 10.
     */
    public function withLimit(?string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of chargebacks to skip, used for pagination.
     */
    public function withOffset(?string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * The start date for the chargebacks. Keep empty to get all.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
