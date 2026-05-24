<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks\TrialLinkListResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\TrialLinks\TrialLinkListResponse\Data\List_\Links;
use Onlyfansapi\TrialLinks\TrialLinkListResponse\Data\List_\Revenue;

/**
 * @phpstan-import-type LinksShape from \Onlyfansapi\TrialLinks\TrialLinkListResponse\Data\List_\Links
 * @phpstan-import-type RevenueShape from \Onlyfansapi\TrialLinks\TrialLinkListResponse\Data\List_\Revenue
 *
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   claimCounts?: int|null,
 *   clicksCounts?: int|null,
 *   createdAt?: string|null,
 *   expiredAt?: string|null,
 *   isFinished?: bool|null,
 *   links?: null|Links|LinksShape,
 *   revenue?: null|Revenue|RevenueShape,
 *   subscribeCounts?: int|null,
 *   subscribeDays?: int|null,
 *   tags?: list<string>|null,
 *   trialLinkName?: string|null,
 *   url?: string|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $claimCounts;

    #[Optional]
    public ?int $clicksCounts;

    #[Optional]
    public ?string $createdAt;

    #[Optional(nullable: true)]
    public ?string $expiredAt;

    #[Optional]
    public ?bool $isFinished;

    #[Optional]
    public ?Links $links;

    #[Optional]
    public ?Revenue $revenue;

    #[Optional]
    public ?int $subscribeCounts;

    #[Optional]
    public ?int $subscribeDays;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional]
    public ?string $trialLinkName;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Links|LinksShape|null $links
     * @param Revenue|RevenueShape|null $revenue
     * @param list<string>|null $tags
     */
    public static function with(
        ?int $id = null,
        ?int $claimCounts = null,
        ?int $clicksCounts = null,
        ?string $createdAt = null,
        ?string $expiredAt = null,
        ?bool $isFinished = null,
        Links|array|null $links = null,
        Revenue|array|null $revenue = null,
        ?int $subscribeCounts = null,
        ?int $subscribeDays = null,
        ?array $tags = null,
        ?string $trialLinkName = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $claimCounts && $self['claimCounts'] = $claimCounts;
        null !== $clicksCounts && $self['clicksCounts'] = $clicksCounts;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiredAt && $self['expiredAt'] = $expiredAt;
        null !== $isFinished && $self['isFinished'] = $isFinished;
        null !== $links && $self['links'] = $links;
        null !== $revenue && $self['revenue'] = $revenue;
        null !== $subscribeCounts && $self['subscribeCounts'] = $subscribeCounts;
        null !== $subscribeDays && $self['subscribeDays'] = $subscribeDays;
        null !== $tags && $self['tags'] = $tags;
        null !== $trialLinkName && $self['trialLinkName'] = $trialLinkName;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withClaimCounts(int $claimCounts): self
    {
        $self = clone $this;
        $self['claimCounts'] = $claimCounts;

        return $self;
    }

    public function withClicksCounts(int $clicksCounts): self
    {
        $self = clone $this;
        $self['clicksCounts'] = $clicksCounts;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withExpiredAt(?string $expiredAt): self
    {
        $self = clone $this;
        $self['expiredAt'] = $expiredAt;

        return $self;
    }

    public function withIsFinished(bool $isFinished): self
    {
        $self = clone $this;
        $self['isFinished'] = $isFinished;

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

    public function withSubscribeCounts(int $subscribeCounts): self
    {
        $self = clone $this;
        $self['subscribeCounts'] = $subscribeCounts;

        return $self;
    }

    public function withSubscribeDays(int $subscribeDays): self
    {
        $self = clone $this;
        $self['subscribeDays'] = $subscribeDays;

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

    public function withTrialLinkName(string $trialLinkName): self
    {
        $self = clone $this;
        $self['trialLinkName'] = $trialLinkName;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
