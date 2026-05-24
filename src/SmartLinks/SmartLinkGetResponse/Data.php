<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkGetResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SmartLinks\SmartLinkGetResponse\Data\Account;
use Onlyfansapi\SmartLinks\SmartLinkGetResponse\Data\Cost;

/**
 * @phpstan-import-type AccountShape from \Onlyfansapi\SmartLinks\SmartLinkGetResponse\Data\Account
 * @phpstan-import-type CostShape from \Onlyfansapi\SmartLinks\SmartLinkGetResponse\Data\Cost
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   account?: null|Account|AccountShape,
 *   clicksCount?: int|null,
 *   conversionsCount?: int|null,
 *   cost?: null|Cost|CostShape,
 *   createdAt?: string|null,
 *   freeTrialDays?: int|null,
 *   linkType?: string|null,
 *   name?: string|null,
 *   revenue?: string|null,
 *   subscribersCount?: int|null,
 *   trafficRedirectURL?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?Account $account;

    #[Optional('clicks_count')]
    public ?int $clicksCount;

    #[Optional('conversions_count')]
    public ?int $conversionsCount;

    #[Optional]
    public ?Cost $cost;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('free_trial_days')]
    public ?int $freeTrialDays;

    #[Optional('link_type')]
    public ?string $linkType;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $revenue;

    #[Optional('subscribers_count')]
    public ?int $subscribersCount;

    #[Optional('traffic_redirect_url')]
    public ?string $trafficRedirectURL;

    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Account|AccountShape|null $account
     * @param Cost|CostShape|null $cost
     */
    public static function with(
        ?string $id = null,
        Account|array|null $account = null,
        ?int $clicksCount = null,
        ?int $conversionsCount = null,
        Cost|array|null $cost = null,
        ?string $createdAt = null,
        ?int $freeTrialDays = null,
        ?string $linkType = null,
        ?string $name = null,
        ?string $revenue = null,
        ?int $subscribersCount = null,
        ?string $trafficRedirectURL = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $account && $self['account'] = $account;
        null !== $clicksCount && $self['clicksCount'] = $clicksCount;
        null !== $conversionsCount && $self['conversionsCount'] = $conversionsCount;
        null !== $cost && $self['cost'] = $cost;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $freeTrialDays && $self['freeTrialDays'] = $freeTrialDays;
        null !== $linkType && $self['linkType'] = $linkType;
        null !== $name && $self['name'] = $name;
        null !== $revenue && $self['revenue'] = $revenue;
        null !== $subscribersCount && $self['subscribersCount'] = $subscribersCount;
        null !== $trafficRedirectURL && $self['trafficRedirectURL'] = $trafficRedirectURL;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Account|AccountShape $account
     */
    public function withAccount(Account|array $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    public function withClicksCount(int $clicksCount): self
    {
        $self = clone $this;
        $self['clicksCount'] = $clicksCount;

        return $self;
    }

    public function withConversionsCount(int $conversionsCount): self
    {
        $self = clone $this;
        $self['conversionsCount'] = $conversionsCount;

        return $self;
    }

    /**
     * @param Cost|CostShape $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withFreeTrialDays(int $freeTrialDays): self
    {
        $self = clone $this;
        $self['freeTrialDays'] = $freeTrialDays;

        return $self;
    }

    public function withLinkType(string $linkType): self
    {
        $self = clone $this;
        $self['linkType'] = $linkType;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withRevenue(string $revenue): self
    {
        $self = clone $this;
        $self['revenue'] = $revenue;

        return $self;
    }

    public function withSubscribersCount(int $subscribersCount): self
    {
        $self = clone $this;
        $self['subscribersCount'] = $subscribersCount;

        return $self;
    }

    public function withTrafficRedirectURL(string $trafficRedirectURL): self
    {
        $self = clone $this;
        $self['trafficRedirectURL'] = $trafficRedirectURL;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
