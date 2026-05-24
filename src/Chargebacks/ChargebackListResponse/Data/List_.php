<?php

declare(strict_types=1);

namespace Onlyfansapi\Chargebacks\ChargebackListResponse\Data;

use Onlyfansapi\Chargebacks\ChargebackListResponse\Data\List_\Payment;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PaymentShape from \Onlyfansapi\Chargebacks\ChargebackListResponse\Data\List_\Payment
 *
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   createdAt?: string|null,
 *   payment?: null|Payment|PaymentShape,
 *   paymentType?: string|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?Payment $payment;

    #[Optional]
    public ?string $paymentType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Payment|PaymentShape|null $payment
     */
    public static function with(
        ?int $id = null,
        ?string $createdAt = null,
        Payment|array|null $payment = null,
        ?string $paymentType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $payment && $self['payment'] = $payment;
        null !== $paymentType && $self['paymentType'] = $paymentType;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param Payment|PaymentShape $payment
     */
    public function withPayment(Payment|array $payment): self
    {
        $self = clone $this;
        $self['payment'] = $payment;

        return $self;
    }

    public function withPaymentType(string $paymentType): self
    {
        $self = clone $this;
        $self['paymentType'] = $paymentType;

        return $self;
    }
}
