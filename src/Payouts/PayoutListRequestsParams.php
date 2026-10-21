<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List all payout requests for the account.
 *
 * @see OnlyFansAPI\Services\PayoutsService::listRequests()
 *
 * @phpstan-type PayoutListRequestsParamsShape = array{
 *   limit?: string|null, offset?: string|null
 * }
 */
final class PayoutListRequestsParams implements BaseModel
{
    /** @use SdkModel<PayoutListRequestsParamsShape> */
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
