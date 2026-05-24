<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type StatisticCalculateTotalTransactionsResponseShape = array{
 *   totalAmount?: float|null, totalTransactions?: int|null
 * }
 */
final class StatisticCalculateTotalTransactionsResponse implements BaseModel
{
    /** @use SdkModel<StatisticCalculateTotalTransactionsResponseShape> */
    use SdkModel;

    #[Optional('total_amount')]
    public ?float $totalAmount;

    #[Optional('total_transactions')]
    public ?int $totalTransactions;

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
        ?float $totalAmount = null,
        ?int $totalTransactions = null
    ): self {
        $self = new self;

        null !== $totalAmount && $self['totalAmount'] = $totalAmount;
        null !== $totalTransactions && $self['totalTransactions'] = $totalTransactions;

        return $self;
    }

    public function withTotalAmount(float $totalAmount): self
    {
        $self = clone $this;
        $self['totalAmount'] = $totalAmount;

        return $self;
    }

    public function withTotalTransactions(int $totalTransactions): self
    {
        $self = clone $this;
        $self['totalTransactions'] = $totalTransactions;

        return $self;
    }
}
