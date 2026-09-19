<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial\Transactions;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type TransactionGetSummaryResponseShape = array{
 *   disputedCount?: int|null,
 *   refundedCount?: int|null,
 *   succeededCount?: int|null,
 *   totalFees?: float|null,
 *   totalGross?: float|null,
 *   totalNet?: float|null,
 * }
 */
final class TransactionGetSummaryResponse implements BaseModel
{
    /** @use SdkModel<TransactionGetSummaryResponseShape> */
    use SdkModel;

    #[Optional('disputed_count')]
    public ?int $disputedCount;

    #[Optional('refunded_count')]
    public ?int $refundedCount;

    #[Optional('succeeded_count')]
    public ?int $succeededCount;

    #[Optional('total_fees')]
    public ?float $totalFees;

    #[Optional('total_gross')]
    public ?float $totalGross;

    #[Optional('total_net')]
    public ?float $totalNet;

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
        ?int $disputedCount = null,
        ?int $refundedCount = null,
        ?int $succeededCount = null,
        ?float $totalFees = null,
        ?float $totalGross = null,
        ?float $totalNet = null,
    ): self {
        $self = new self;

        null !== $disputedCount && $self['disputedCount'] = $disputedCount;
        null !== $refundedCount && $self['refundedCount'] = $refundedCount;
        null !== $succeededCount && $self['succeededCount'] = $succeededCount;
        null !== $totalFees && $self['totalFees'] = $totalFees;
        null !== $totalGross && $self['totalGross'] = $totalGross;
        null !== $totalNet && $self['totalNet'] = $totalNet;

        return $self;
    }

    public function withDisputedCount(int $disputedCount): self
    {
        $self = clone $this;
        $self['disputedCount'] = $disputedCount;

        return $self;
    }

    public function withRefundedCount(int $refundedCount): self
    {
        $self = clone $this;
        $self['refundedCount'] = $refundedCount;

        return $self;
    }

    public function withSucceededCount(int $succeededCount): self
    {
        $self = clone $this;
        $self['succeededCount'] = $succeededCount;

        return $self;
    }

    public function withTotalFees(float $totalFees): self
    {
        $self = clone $this;
        $self['totalFees'] = $totalFees;

        return $self;
    }

    public function withTotalGross(float $totalGross): self
    {
        $self = clone $this;
        $self['totalGross'] = $totalGross;

        return $self;
    }

    public function withTotalNet(float $totalNet): self
    {
        $self = clone $this;
        $self['totalNet'] = $totalNet;

        return $self;
    }
}
