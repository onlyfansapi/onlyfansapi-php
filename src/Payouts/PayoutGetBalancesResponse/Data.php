<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts\PayoutGetBalancesResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Payouts\PayoutGetBalancesResponse\Data\WithdrawalPeriodOption;

/**
 * @phpstan-import-type WithdrawalPeriodOptionShape from \OnlyFansAPI\Payouts\PayoutGetBalancesResponse\Data\WithdrawalPeriodOption
 *
 * @phpstan-type DataShape = array{
 *   currency?: string|null,
 *   manualPayoutPendingDays?: int|null,
 *   maxPayoutSumm?: float|null,
 *   minPayoutSumm?: int|null,
 *   payoutAvailable?: float|null,
 *   payoutPending?: float|null,
 *   withdrawalPeriod?: string|null,
 *   withdrawalPeriodOptions?: list<WithdrawalPeriodOption|WithdrawalPeriodOptionShape>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $currency;

    #[Optional]
    public ?int $manualPayoutPendingDays;

    #[Optional]
    public ?float $maxPayoutSumm;

    #[Optional]
    public ?int $minPayoutSumm;

    #[Optional]
    public ?float $payoutAvailable;

    #[Optional]
    public ?float $payoutPending;

    #[Optional]
    public ?string $withdrawalPeriod;

    /** @var list<WithdrawalPeriodOption>|null $withdrawalPeriodOptions */
    #[Optional(list: WithdrawalPeriodOption::class)]
    public ?array $withdrawalPeriodOptions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<WithdrawalPeriodOption|WithdrawalPeriodOptionShape>|null $withdrawalPeriodOptions
     */
    public static function with(
        ?string $currency = null,
        ?int $manualPayoutPendingDays = null,
        ?float $maxPayoutSumm = null,
        ?int $minPayoutSumm = null,
        ?float $payoutAvailable = null,
        ?float $payoutPending = null,
        ?string $withdrawalPeriod = null,
        ?array $withdrawalPeriodOptions = null,
    ): self {
        $self = new self;

        null !== $currency && $self['currency'] = $currency;
        null !== $manualPayoutPendingDays && $self['manualPayoutPendingDays'] = $manualPayoutPendingDays;
        null !== $maxPayoutSumm && $self['maxPayoutSumm'] = $maxPayoutSumm;
        null !== $minPayoutSumm && $self['minPayoutSumm'] = $minPayoutSumm;
        null !== $payoutAvailable && $self['payoutAvailable'] = $payoutAvailable;
        null !== $payoutPending && $self['payoutPending'] = $payoutPending;
        null !== $withdrawalPeriod && $self['withdrawalPeriod'] = $withdrawalPeriod;
        null !== $withdrawalPeriodOptions && $self['withdrawalPeriodOptions'] = $withdrawalPeriodOptions;

        return $self;
    }

    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    public function withManualPayoutPendingDays(
        int $manualPayoutPendingDays
    ): self {
        $self = clone $this;
        $self['manualPayoutPendingDays'] = $manualPayoutPendingDays;

        return $self;
    }

    public function withMaxPayoutSumm(float $maxPayoutSumm): self
    {
        $self = clone $this;
        $self['maxPayoutSumm'] = $maxPayoutSumm;

        return $self;
    }

    public function withMinPayoutSumm(int $minPayoutSumm): self
    {
        $self = clone $this;
        $self['minPayoutSumm'] = $minPayoutSumm;

        return $self;
    }

    public function withPayoutAvailable(float $payoutAvailable): self
    {
        $self = clone $this;
        $self['payoutAvailable'] = $payoutAvailable;

        return $self;
    }

    public function withPayoutPending(float $payoutPending): self
    {
        $self = clone $this;
        $self['payoutPending'] = $payoutPending;

        return $self;
    }

    public function withWithdrawalPeriod(string $withdrawalPeriod): self
    {
        $self = clone $this;
        $self['withdrawalPeriod'] = $withdrawalPeriod;

        return $self;
    }

    /**
     * @param list<WithdrawalPeriodOption|WithdrawalPeriodOptionShape> $withdrawalPeriodOptions
     */
    public function withWithdrawalPeriodOptions(
        array $withdrawalPeriodOptions
    ): self {
        $self = clone $this;
        $self['withdrawalPeriodOptions'] = $withdrawalPeriodOptions;

        return $self;
    }
}
