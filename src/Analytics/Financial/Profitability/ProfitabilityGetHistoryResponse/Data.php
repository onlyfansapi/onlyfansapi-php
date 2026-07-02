<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   activeMilestones?: string|null,
 *   agencyEarnings?: string|null,
 *   commissionAmount?: string|null,
 *   commissionRate?: string|null,
 *   costs?: list<mixed>|null,
 *   creatorName?: string|null,
 *   hasCommissionForPeriod?: bool|null,
 *   hasCostsForPeriod?: bool|null,
 *   marginPercentage?: string|null,
 *   month?: int|null,
 *   onlyFansUserID?: int|null,
 *   profit?: string|null,
 *   projectedNet?: string|null,
 *   ratePeriods?: list<mixed>|null,
 *   referralNote?: string|null,
 *   totalCosts?: string|null,
 *   year?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $activeMilestones;

    #[Optional]
    public ?string $agencyEarnings;

    #[Optional]
    public ?string $commissionAmount;

    #[Optional]
    public ?string $commissionRate;

    /** @var list<mixed>|null $costs */
    #[Optional(list: 'mixed')]
    public ?array $costs;

    #[Optional]
    public ?string $creatorName;

    #[Optional]
    public ?bool $hasCommissionForPeriod;

    #[Optional]
    public ?bool $hasCostsForPeriod;

    #[Optional]
    public ?string $marginPercentage;

    #[Optional]
    public ?int $month;

    #[Optional('onlyFansUserId')]
    public ?int $onlyFansUserID;

    #[Optional]
    public ?string $profit;

    #[Optional]
    public ?string $projectedNet;

    /** @var list<mixed>|null $ratePeriods */
    #[Optional(list: 'mixed')]
    public ?array $ratePeriods;

    #[Optional(nullable: true)]
    public ?string $referralNote;

    #[Optional]
    public ?string $totalCosts;

    #[Optional]
    public ?int $year;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $costs
     * @param list<mixed>|null $ratePeriods
     */
    public static function with(
        ?string $activeMilestones = null,
        ?string $agencyEarnings = null,
        ?string $commissionAmount = null,
        ?string $commissionRate = null,
        ?array $costs = null,
        ?string $creatorName = null,
        ?bool $hasCommissionForPeriod = null,
        ?bool $hasCostsForPeriod = null,
        ?string $marginPercentage = null,
        ?int $month = null,
        ?int $onlyFansUserID = null,
        ?string $profit = null,
        ?string $projectedNet = null,
        ?array $ratePeriods = null,
        ?string $referralNote = null,
        ?string $totalCosts = null,
        ?int $year = null,
    ): self {
        $self = new self;

        null !== $activeMilestones && $self['activeMilestones'] = $activeMilestones;
        null !== $agencyEarnings && $self['agencyEarnings'] = $agencyEarnings;
        null !== $commissionAmount && $self['commissionAmount'] = $commissionAmount;
        null !== $commissionRate && $self['commissionRate'] = $commissionRate;
        null !== $costs && $self['costs'] = $costs;
        null !== $creatorName && $self['creatorName'] = $creatorName;
        null !== $hasCommissionForPeriod && $self['hasCommissionForPeriod'] = $hasCommissionForPeriod;
        null !== $hasCostsForPeriod && $self['hasCostsForPeriod'] = $hasCostsForPeriod;
        null !== $marginPercentage && $self['marginPercentage'] = $marginPercentage;
        null !== $month && $self['month'] = $month;
        null !== $onlyFansUserID && $self['onlyFansUserID'] = $onlyFansUserID;
        null !== $profit && $self['profit'] = $profit;
        null !== $projectedNet && $self['projectedNet'] = $projectedNet;
        null !== $ratePeriods && $self['ratePeriods'] = $ratePeriods;
        null !== $referralNote && $self['referralNote'] = $referralNote;
        null !== $totalCosts && $self['totalCosts'] = $totalCosts;
        null !== $year && $self['year'] = $year;

        return $self;
    }

    public function withActiveMilestones(?string $activeMilestones): self
    {
        $self = clone $this;
        $self['activeMilestones'] = $activeMilestones;

        return $self;
    }

    public function withAgencyEarnings(string $agencyEarnings): self
    {
        $self = clone $this;
        $self['agencyEarnings'] = $agencyEarnings;

        return $self;
    }

    public function withCommissionAmount(string $commissionAmount): self
    {
        $self = clone $this;
        $self['commissionAmount'] = $commissionAmount;

        return $self;
    }

    public function withCommissionRate(string $commissionRate): self
    {
        $self = clone $this;
        $self['commissionRate'] = $commissionRate;

        return $self;
    }

    /**
     * @param list<mixed> $costs
     */
    public function withCosts(array $costs): self
    {
        $self = clone $this;
        $self['costs'] = $costs;

        return $self;
    }

    public function withCreatorName(string $creatorName): self
    {
        $self = clone $this;
        $self['creatorName'] = $creatorName;

        return $self;
    }

    public function withHasCommissionForPeriod(
        bool $hasCommissionForPeriod
    ): self {
        $self = clone $this;
        $self['hasCommissionForPeriod'] = $hasCommissionForPeriod;

        return $self;
    }

    public function withHasCostsForPeriod(bool $hasCostsForPeriod): self
    {
        $self = clone $this;
        $self['hasCostsForPeriod'] = $hasCostsForPeriod;

        return $self;
    }

    public function withMarginPercentage(string $marginPercentage): self
    {
        $self = clone $this;
        $self['marginPercentage'] = $marginPercentage;

        return $self;
    }

    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    public function withOnlyFansUserID(int $onlyFansUserID): self
    {
        $self = clone $this;
        $self['onlyFansUserID'] = $onlyFansUserID;

        return $self;
    }

    public function withProfit(string $profit): self
    {
        $self = clone $this;
        $self['profit'] = $profit;

        return $self;
    }

    public function withProjectedNet(string $projectedNet): self
    {
        $self = clone $this;
        $self['projectedNet'] = $projectedNet;

        return $self;
    }

    /**
     * @param list<mixed> $ratePeriods
     */
    public function withRatePeriods(array $ratePeriods): self
    {
        $self = clone $this;
        $self['ratePeriods'] = $ratePeriods;

        return $self;
    }

    public function withReferralNote(?string $referralNote): self
    {
        $self = clone $this;
        $self['referralNote'] = $referralNote;

        return $self;
    }

    public function withTotalCosts(string $totalCosts): self
    {
        $self = clone $this;
        $self['totalCosts'] = $totalCosts;

        return $self;
    }

    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }
}
