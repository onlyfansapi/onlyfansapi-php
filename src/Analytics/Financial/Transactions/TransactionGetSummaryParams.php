<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Financial\Transactions;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get transaction summary including counts for succeeded, refunded, and disputed transactions, plus gross, net, and fee totals.
 *
 * @see Onlyfansapi\Services\Analytics\Financial\TransactionsService::getSummary()
 *
 * @phpstan-type TransactionGetSummaryParamsShape = array{
 *   accountIDs: list<string>, endDate: string, startDate: string
 * }
 */
final class TransactionGetSummaryParams implements BaseModel
{
    /** @use SdkModel<TransactionGetSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of account prefixed IDs.
     *
     * @var list<string> $accountIDs
     */
    #[Required('account_ids', list: 'string')]
    public array $accountIDs;

    /**
     * The end date (ISO 8601 format).
     */
    #[Required('end_date')]
    public string $endDate;

    /**
     * The start date (ISO 8601 format).
     */
    #[Required('start_date')]
    public string $startDate;

    /**
     * `new TransactionGetSummaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransactionGetSummaryParams::with(accountIDs: ..., endDate: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransactionGetSummaryParams)
     *   ->withAccountIDs(...)
     *   ->withEndDate(...)
     *   ->withStartDate(...)
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
     *
     * @param list<string> $accountIDs
     */
    public static function with(
        array $accountIDs,
        string $endDate,
        string $startDate
    ): self {
        $self = new self;

        $self['accountIDs'] = $accountIDs;
        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Array of account prefixed IDs.
     *
     * @param list<string> $accountIDs
     */
    public function withAccountIDs(array $accountIDs): self
    {
        $self = clone $this;
        $self['accountIDs'] = $accountIDs;

        return $self;
    }

    /**
     * The end date (ISO 8601 format).
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date (ISO 8601 format).
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
