<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutListPayoutRequestsResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListShape = array{
 *   amount?: int|null,
 *   createdAt?: string|null,
 *   currency?: string|null,
 *   invoiceID?: string|null,
 *   rejectReason?: string|null,
 *   state?: string|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?int $amount;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?string $currency;

    #[Optional('invoiceId')]
    public ?string $invoiceID;

    #[Optional]
    public ?string $rejectReason;

    #[Optional]
    public ?string $state;

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
        ?int $amount = null,
        ?string $createdAt = null,
        ?string $currency = null,
        ?string $invoiceID = null,
        ?string $rejectReason = null,
        ?string $state = null,
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $invoiceID && $self['invoiceID'] = $invoiceID;
        null !== $rejectReason && $self['rejectReason'] = $rejectReason;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    public function withInvoiceID(string $invoiceID): self
    {
        $self = clone $this;
        $self['invoiceID'] = $invoiceID;

        return $self;
    }

    public function withRejectReason(string $rejectReason): self
    {
        $self = clone $this;
        $self['rejectReason'] = $rejectReason;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
