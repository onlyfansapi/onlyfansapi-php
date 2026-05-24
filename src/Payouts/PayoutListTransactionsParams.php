<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List all transactions for the account.
 *
 * @see Onlyfansapi\Services\PayoutsService::listTransactions()
 *
 * @phpstan-type PayoutListTransactionsParamsShape = array{
 *   limit?: string|null, marker?: string|null
 * }
 */
final class PayoutListTransactionsParams implements BaseModel
{
    /** @use SdkModel<PayoutListTransactionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of transactions to return.
     */
    #[Optional]
    public ?string $limit;

    /**
     * The marker used for pagination. Default: `null`.
     */
    #[Optional]
    public ?string $marker;

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
        ?string $marker = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $marker && $self['marker'] = $marker;

        return $self;
    }

    /**
     * Number of transactions to return.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The marker used for pagination. Default: `null`.
     */
    public function withMarker(string $marker): self
    {
        $self = clone $this;
        $self['marker'] = $marker;

        return $self;
    }
}
