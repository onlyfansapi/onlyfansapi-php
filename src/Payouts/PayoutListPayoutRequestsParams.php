<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List all payout requests for the account.
 *
 * @see Onlyfansapi\Services\PayoutsService::listPayoutRequests()
 *
 * @phpstan-type PayoutListPayoutRequestsParamsShape = array{
 *   limit?: string|null, offset?: string|null
 * }
 */
final class PayoutListPayoutRequestsParams implements BaseModel
{
    /** @use SdkModel<PayoutListPayoutRequestsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of payout requests to return.
     */
    #[Optional]
    public ?string $limit;

    /**
     * Number of payout requests to skip for pagination.
     */
    #[Optional]
    public ?string $offset;

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
        ?string $limit = null,
        ?string $offset = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Number of payout requests to return.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of payout requests to skip for pagination.
     */
    public function withOffset(string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
