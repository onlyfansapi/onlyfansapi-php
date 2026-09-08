<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse\Data\Cost;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse\Data\Links;
use OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse\Data\Revenue;

/**
 * @phpstan-import-type CostShape from \OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse\Data\Cost
 * @phpstan-import-type LinksShape from \OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse\Data\Links
 * @phpstan-import-type RevenueShape from \OnlyFansAPI\TrackingLinks\TrackingLinkGetResponse\Data\Revenue
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   campaignCode?: int|null,
 *   campaignName?: string|null,
 *   campaignURL?: string|null,
 *   clicksCount?: string|null,
 *   cost?: null|Cost|CostShape,
 *   createdAt?: string|null,
 *   endDate?: string|null,
 *   links?: null|Links|LinksShape,
 *   revenue?: null|Revenue|RevenueShape,
 *   subscribersCount?: string|null,
 *   tags?: list<string>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $campaignCode;

    #[Optional]
    public ?string $campaignName;

    #[Optional('campaignUrl')]
    public ?string $campaignURL;

    #[Optional(nullable: true)]
    public ?string $clicksCount;

    #[Optional]
    public ?Cost $cost;

    #[Optional]
    public ?string $createdAt;

    #[Optional(nullable: true)]
    public ?string $endDate;

    #[Optional]
    public ?Links $links;

    #[Optional]
    public ?Revenue $revenue;

    #[Optional(nullable: true)]
    public ?string $subscribersCount;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Cost|CostShape|null $cost
     * @param Links|LinksShape|null $links
     * @param Revenue|RevenueShape|null $revenue
     * @param list<string>|null $tags
     */
    public static function with(
        ?int $id = null,
        ?int $campaignCode = null,
        ?string $campaignName = null,
        ?string $campaignURL = null,
        ?string $clicksCount = null,
        Cost|array|null $cost = null,
        ?string $createdAt = null,
        ?string $endDate = null,
        Links|array|null $links = null,
        Revenue|array|null $revenue = null,
        ?string $subscribersCount = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $campaignCode && $self['campaignCode'] = $campaignCode;
        null !== $campaignName && $self['campaignName'] = $campaignName;
        null !== $campaignURL && $self['campaignURL'] = $campaignURL;
        null !== $clicksCount && $self['clicksCount'] = $clicksCount;
        null !== $cost && $self['cost'] = $cost;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $links && $self['links'] = $links;
        null !== $revenue && $self['revenue'] = $revenue;
        null !== $subscribersCount && $self['subscribersCount'] = $subscribersCount;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCampaignCode(int $campaignCode): self
    {
        $self = clone $this;
        $self['campaignCode'] = $campaignCode;

        return $self;
    }

    public function withCampaignName(string $campaignName): self
    {
        $self = clone $this;
        $self['campaignName'] = $campaignName;

        return $self;
    }

    public function withCampaignURL(string $campaignURL): self
    {
        $self = clone $this;
        $self['campaignURL'] = $campaignURL;

        return $self;
    }

    public function withClicksCount(?string $clicksCount): self
    {
        $self = clone $this;
        $self['clicksCount'] = $clicksCount;

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

    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * @param Links|LinksShape $links
     */
    public function withLinks(Links|array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    /**
     * @param Revenue|RevenueShape $revenue
     */
    public function withRevenue(Revenue|array $revenue): self
    {
        $self = clone $this;
        $self['revenue'] = $revenue;

        return $self;
    }

    public function withSubscribersCount(?string $subscribersCount): self
    {
        $self = clone $this;
        $self['subscribersCount'] = $subscribersCount;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
