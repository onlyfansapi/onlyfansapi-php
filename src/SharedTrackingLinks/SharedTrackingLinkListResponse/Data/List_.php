<?php

declare(strict_types=1);

namespace Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListResponse\Data\List_\Owner;

/**
 * @phpstan-import-type OwnerShape from \Onlyfansapi\SharedTrackingLinks\SharedTrackingLinkListResponse\Data\List_\Owner
 *
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   campaignCode?: int|null,
 *   campaignName?: string|null,
 *   campaignURL?: string|null,
 *   clicksCount?: int|null,
 *   createdAt?: string|null,
 *   endDate?: string|null,
 *   isDeleted?: bool|null,
 *   owner?: null|Owner|OwnerShape,
 *   subscribersCount?: int|null,
 *   tags?: list<mixed>|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $campaignCode;

    #[Optional]
    public ?string $campaignName;

    #[Optional('campaignUrl')]
    public ?string $campaignURL;

    #[Optional]
    public ?int $clicksCount;

    #[Optional]
    public ?string $createdAt;

    #[Optional(nullable: true)]
    public ?string $endDate;

    #[Optional]
    public ?bool $isDeleted;

    #[Optional]
    public ?Owner $owner;

    #[Optional]
    public ?int $subscribersCount;

    /** @var list<mixed>|null $tags */
    #[Optional(list: 'mixed')]
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
     * @param Owner|OwnerShape|null $owner
     * @param list<mixed>|null $tags
     */
    public static function with(
        ?int $id = null,
        ?int $campaignCode = null,
        ?string $campaignName = null,
        ?string $campaignURL = null,
        ?int $clicksCount = null,
        ?string $createdAt = null,
        ?string $endDate = null,
        ?bool $isDeleted = null,
        Owner|array|null $owner = null,
        ?int $subscribersCount = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $campaignCode && $self['campaignCode'] = $campaignCode;
        null !== $campaignName && $self['campaignName'] = $campaignName;
        null !== $campaignURL && $self['campaignURL'] = $campaignURL;
        null !== $clicksCount && $self['clicksCount'] = $clicksCount;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $isDeleted && $self['isDeleted'] = $isDeleted;
        null !== $owner && $self['owner'] = $owner;
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

    public function withClicksCount(int $clicksCount): self
    {
        $self = clone $this;
        $self['clicksCount'] = $clicksCount;

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

    public function withIsDeleted(bool $isDeleted): self
    {
        $self = clone $this;
        $self['isDeleted'] = $isDeleted;

        return $self;
    }

    /**
     * @param Owner|OwnerShape $owner
     */
    public function withOwner(Owner|array $owner): self
    {
        $self = clone $this;
        $self['owner'] = $owner;

        return $self;
    }

    public function withSubscribersCount(int $subscribersCount): self
    {
        $self = clone $this;
        $self['subscribersCount'] = $subscribersCount;

        return $self;
    }

    /**
     * @param list<mixed> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
