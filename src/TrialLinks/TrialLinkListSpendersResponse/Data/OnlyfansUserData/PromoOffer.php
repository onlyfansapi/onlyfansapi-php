<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse\Data\OnlyfansUserData;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type PromoOfferShape = array{
 *   id?: int|null,
 *   createdAt?: string|null,
 *   expiredAt?: string|null,
 *   finishedAt?: string|null,
 *   subscribeDays?: int|null,
 *   subscriberID?: string|null,
 *   userID?: string|null,
 * }
 */
final class PromoOffer implements BaseModel
{
    /** @use SdkModel<PromoOfferShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?string $expiredAt;

    #[Optional]
    public ?string $finishedAt;

    #[Optional]
    public ?int $subscribeDays;

    #[Optional('subscriberId')]
    public ?string $subscriberID;

    #[Optional('userId')]
    public ?string $userID;

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
        ?string $createdAt = null,
        ?string $expiredAt = null,
        ?string $finishedAt = null,
        ?int $subscribeDays = null,
        ?string $subscriberID = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiredAt && $self['expiredAt'] = $expiredAt;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $subscribeDays && $self['subscribeDays'] = $subscribeDays;
        null !== $subscriberID && $self['subscriberID'] = $subscriberID;
        null !== $userID && $self['userID'] = $userID;

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

    public function withExpiredAt(string $expiredAt): self
    {
        $self = clone $this;
        $self['expiredAt'] = $expiredAt;

        return $self;
    }

    public function withFinishedAt(string $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    public function withSubscribeDays(int $subscribeDays): self
    {
        $self = clone $this;
        $self['subscribeDays'] = $subscribeDays;

        return $self;
    }

    public function withSubscriberID(string $subscriberID): self
    {
        $self = clone $this;
        $self['subscriberID'] = $subscriberID;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
