<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutListTransactionsResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Payouts\PayoutListTransactionsResponse\Data\List_\User;

/**
 * @phpstan-import-type UserShape from \Onlyfansapi\Payouts\PayoutListTransactionsResponse\Data\List_\User
 *
 * @phpstan-type ListShape = array{
 *   id?: string|null,
 *   amount?: float|null,
 *   createdAt?: string|null,
 *   currency?: string|null,
 *   description?: string|null,
 *   fee?: float|null,
 *   mediaTaxAmount?: float|null,
 *   net?: float|null,
 *   payoutPendingDays?: int|null,
 *   status?: string|null,
 *   taxAmount?: float|null,
 *   user?: null|User|UserShape,
 *   vatAmount?: float|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?float $amount;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?string $currency;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?float $fee;

    #[Optional]
    public ?float $mediaTaxAmount;

    #[Optional]
    public ?float $net;

    #[Optional]
    public ?int $payoutPendingDays;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?float $taxAmount;

    #[Optional]
    public ?User $user;

    #[Optional]
    public ?float $vatAmount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param User|UserShape|null $user
     */
    public static function with(
        ?string $id = null,
        ?float $amount = null,
        ?string $createdAt = null,
        ?string $currency = null,
        ?string $description = null,
        ?float $fee = null,
        ?float $mediaTaxAmount = null,
        ?float $net = null,
        ?int $payoutPendingDays = null,
        ?string $status = null,
        ?float $taxAmount = null,
        User|array|null $user = null,
        ?float $vatAmount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $amount && $self['amount'] = $amount;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $description && $self['description'] = $description;
        null !== $fee && $self['fee'] = $fee;
        null !== $mediaTaxAmount && $self['mediaTaxAmount'] = $mediaTaxAmount;
        null !== $net && $self['net'] = $net;
        null !== $payoutPendingDays && $self['payoutPendingDays'] = $payoutPendingDays;
        null !== $status && $self['status'] = $status;
        null !== $taxAmount && $self['taxAmount'] = $taxAmount;
        null !== $user && $self['user'] = $user;
        null !== $vatAmount && $self['vatAmount'] = $vatAmount;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAmount(float $amount): self
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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withFee(float $fee): self
    {
        $self = clone $this;
        $self['fee'] = $fee;

        return $self;
    }

    public function withMediaTaxAmount(float $mediaTaxAmount): self
    {
        $self = clone $this;
        $self['mediaTaxAmount'] = $mediaTaxAmount;

        return $self;
    }

    public function withNet(float $net): self
    {
        $self = clone $this;
        $self['net'] = $net;

        return $self;
    }

    public function withPayoutPendingDays(int $payoutPendingDays): self
    {
        $self = clone $this;
        $self['payoutPendingDays'] = $payoutPendingDays;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTaxAmount(float $taxAmount): self
    {
        $self = clone $this;
        $self['taxAmount'] = $taxAmount;

        return $self;
    }

    /**
     * @param User|UserShape $user
     */
    public function withUser(User|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }

    public function withVatAmount(float $vatAmount): self
    {
        $self = clone $this;
        $self['vatAmount'] = $vatAmount;

        return $self;
    }
}
