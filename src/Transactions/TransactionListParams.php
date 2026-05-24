<?php

declare(strict_types=1);

namespace Onlyfansapi\Transactions;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get a paginated list of transactions for an Account. Newest transactions are first.
 *
 * @see Onlyfansapi\Services\TransactionsService::list()
 *
 * @phpstan-type TransactionListParamsShape = array{
 *   limit?: string|null, marker?: string|null, startDate?: string|null
 * }
 */
final class TransactionListParams implements BaseModel
{
    /** @use SdkModel<TransactionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of transactions to return. Recommended: `10`.
     */
    #[Optional]
    public ?string $limit;

    /**
     * The marker used for pagination. Default: `null`.
     */
    #[Optional]
    public ?string $marker;

    /**
     * The start date for transactions list. Default: `-30days`.
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
        ?string $limit = null,
        ?string $marker = null,
        ?string $startDate = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $marker && $self['marker'] = $marker;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The number of transactions to return. Recommended: `10`.
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

    /**
     * The start date for transactions list. Default: `-30days`.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
