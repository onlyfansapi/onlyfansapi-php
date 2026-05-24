<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkNewResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   campaignCode?: int|null,
 *   campaignName?: string|null,
 *   countSubscribers?: int|null,
 *   countTransitions?: int|null,
 *   createdAt?: string|null,
 *   endDate?: string|null,
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

    #[Optional]
    public ?int $countSubscribers;

    #[Optional]
    public ?int $countTransitions;

    #[Optional]
    public ?string $createdAt;

    #[Optional(nullable: true)]
    public ?string $endDate;

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
        ?int $id = null,
        ?int $campaignCode = null,
        ?string $campaignName = null,
        ?int $countSubscribers = null,
        ?int $countTransitions = null,
        ?string $createdAt = null,
        ?string $endDate = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $campaignCode && $self['campaignCode'] = $campaignCode;
        null !== $campaignName && $self['campaignName'] = $campaignName;
        null !== $countSubscribers && $self['countSubscribers'] = $countSubscribers;
        null !== $countTransitions && $self['countTransitions'] = $countTransitions;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endDate && $self['endDate'] = $endDate;

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

    public function withCountSubscribers(int $countSubscribers): self
    {
        $self = clone $this;
        $self['countSubscribers'] = $countSubscribers;

        return $self;
    }

    public function withCountTransitions(int $countTransitions): self
    {
        $self = clone $this;
        $self['countTransitions'] = $countTransitions;

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
}
