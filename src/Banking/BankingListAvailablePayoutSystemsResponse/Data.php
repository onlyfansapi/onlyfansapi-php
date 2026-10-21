<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\BankingListAvailablePayoutSystemsResponse;

use OnlyFansAPI\Banking\BankingListAvailablePayoutSystemsResponse\Data\Payout;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PayoutShape from \OnlyFansAPI\Banking\BankingListAvailablePayoutSystemsResponse\Data\Payout
 *
 * @phpstan-type DataShape = array{
 *   payoutCode?: string|null, payouts?: list<Payout|PayoutShape>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $payoutCode;

    /** @var list<Payout>|null $payouts */
    #[Optional(list: Payout::class)]
    public ?array $payouts;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Payout|PayoutShape>|null $payouts
     */
    public static function with(
        ?string $payoutCode = null,
        ?array $payouts = null
    ): self {
        $self = new self;

        null !== $payoutCode && $self['payoutCode'] = $payoutCode;
        null !== $payouts && $self['payouts'] = $payouts;

        return $self;
    }

    public function withPayoutCode(string $payoutCode): self
    {
        $self = clone $this;
        $self['payoutCode'] = $payoutCode;

        return $self;
    }

    /**
     * @param list<Payout|PayoutShape> $payouts
     */
    public function withPayouts(array $payouts): self
    {
        $self = clone $this;
        $self['payouts'] = $payouts;

        return $self;
    }
}
