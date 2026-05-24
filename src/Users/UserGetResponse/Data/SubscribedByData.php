<?php

declare(strict_types=1);

namespace Onlyfansapi\Users\UserGetResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Users\UserGetResponse\Data\SubscribedByData\Subscribe;

/**
 * @phpstan-import-type SubscribeShape from \Onlyfansapi\Users\UserGetResponse\Data\SubscribedByData\Subscribe
 *
 * @phpstan-type SubscribedByDataShape = array{
 *   discountFinishedAt?: string|null,
 *   discountPercent?: int|null,
 *   discountPeriod?: int|null,
 *   discountStartedAt?: string|null,
 *   duration?: string|null,
 *   expiredAt?: string|null,
 *   hasActivePaidSubscriptions?: bool|null,
 *   isMuted?: bool|null,
 *   newPrice?: int|null,
 *   price?: int|null,
 *   regularPrice?: float|null,
 *   renewedAt?: string|null,
 *   showPostsInFeed?: bool|null,
 *   status?: string|null,
 *   subscribeAt?: string|null,
 *   subscribePrice?: float|null,
 *   subscribes?: list<Subscribe|SubscribeShape>|null,
 *   unsubscribeReason?: string|null,
 * }
 */
final class SubscribedByData implements BaseModel
{
    /** @use SdkModel<SubscribedByDataShape> */
    use SdkModel;

    #[Optional]
    public ?string $discountFinishedAt;

    #[Optional]
    public ?int $discountPercent;

    #[Optional]
    public ?int $discountPeriod;

    #[Optional]
    public ?string $discountStartedAt;

    #[Optional]
    public ?string $duration;

    #[Optional]
    public ?string $expiredAt;

    #[Optional]
    public ?bool $hasActivePaidSubscriptions;

    #[Optional]
    public ?bool $isMuted;

    #[Optional]
    public ?int $newPrice;

    #[Optional]
    public ?int $price;

    #[Optional]
    public ?float $regularPrice;

    #[Optional]
    public ?string $renewedAt;

    #[Optional]
    public ?bool $showPostsInFeed;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $subscribeAt;

    #[Optional]
    public ?float $subscribePrice;

    /** @var list<Subscribe>|null $subscribes */
    #[Optional(list: Subscribe::class)]
    public ?array $subscribes;

    #[Optional]
    public ?string $unsubscribeReason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Subscribe|SubscribeShape>|null $subscribes
     */
    public static function with(
        ?string $discountFinishedAt = null,
        ?int $discountPercent = null,
        ?int $discountPeriod = null,
        ?string $discountStartedAt = null,
        ?string $duration = null,
        ?string $expiredAt = null,
        ?bool $hasActivePaidSubscriptions = null,
        ?bool $isMuted = null,
        ?int $newPrice = null,
        ?int $price = null,
        ?float $regularPrice = null,
        ?string $renewedAt = null,
        ?bool $showPostsInFeed = null,
        ?string $status = null,
        ?string $subscribeAt = null,
        ?float $subscribePrice = null,
        ?array $subscribes = null,
        ?string $unsubscribeReason = null,
    ): self {
        $self = new self;

        null !== $discountFinishedAt && $self['discountFinishedAt'] = $discountFinishedAt;
        null !== $discountPercent && $self['discountPercent'] = $discountPercent;
        null !== $discountPeriod && $self['discountPeriod'] = $discountPeriod;
        null !== $discountStartedAt && $self['discountStartedAt'] = $discountStartedAt;
        null !== $duration && $self['duration'] = $duration;
        null !== $expiredAt && $self['expiredAt'] = $expiredAt;
        null !== $hasActivePaidSubscriptions && $self['hasActivePaidSubscriptions'] = $hasActivePaidSubscriptions;
        null !== $isMuted && $self['isMuted'] = $isMuted;
        null !== $newPrice && $self['newPrice'] = $newPrice;
        null !== $price && $self['price'] = $price;
        null !== $regularPrice && $self['regularPrice'] = $regularPrice;
        null !== $renewedAt && $self['renewedAt'] = $renewedAt;
        null !== $showPostsInFeed && $self['showPostsInFeed'] = $showPostsInFeed;
        null !== $status && $self['status'] = $status;
        null !== $subscribeAt && $self['subscribeAt'] = $subscribeAt;
        null !== $subscribePrice && $self['subscribePrice'] = $subscribePrice;
        null !== $subscribes && $self['subscribes'] = $subscribes;
        null !== $unsubscribeReason && $self['unsubscribeReason'] = $unsubscribeReason;

        return $self;
    }

    public function withDiscountFinishedAt(string $discountFinishedAt): self
    {
        $self = clone $this;
        $self['discountFinishedAt'] = $discountFinishedAt;

        return $self;
    }

    public function withDiscountPercent(int $discountPercent): self
    {
        $self = clone $this;
        $self['discountPercent'] = $discountPercent;

        return $self;
    }

    public function withDiscountPeriod(int $discountPeriod): self
    {
        $self = clone $this;
        $self['discountPeriod'] = $discountPeriod;

        return $self;
    }

    public function withDiscountStartedAt(string $discountStartedAt): self
    {
        $self = clone $this;
        $self['discountStartedAt'] = $discountStartedAt;

        return $self;
    }

    public function withDuration(string $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    public function withExpiredAt(string $expiredAt): self
    {
        $self = clone $this;
        $self['expiredAt'] = $expiredAt;

        return $self;
    }

    public function withHasActivePaidSubscriptions(
        bool $hasActivePaidSubscriptions
    ): self {
        $self = clone $this;
        $self['hasActivePaidSubscriptions'] = $hasActivePaidSubscriptions;

        return $self;
    }

    public function withIsMuted(bool $isMuted): self
    {
        $self = clone $this;
        $self['isMuted'] = $isMuted;

        return $self;
    }

    public function withNewPrice(int $newPrice): self
    {
        $self = clone $this;
        $self['newPrice'] = $newPrice;

        return $self;
    }

    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withRegularPrice(float $regularPrice): self
    {
        $self = clone $this;
        $self['regularPrice'] = $regularPrice;

        return $self;
    }

    public function withRenewedAt(string $renewedAt): self
    {
        $self = clone $this;
        $self['renewedAt'] = $renewedAt;

        return $self;
    }

    public function withShowPostsInFeed(bool $showPostsInFeed): self
    {
        $self = clone $this;
        $self['showPostsInFeed'] = $showPostsInFeed;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubscribeAt(string $subscribeAt): self
    {
        $self = clone $this;
        $self['subscribeAt'] = $subscribeAt;

        return $self;
    }

    public function withSubscribePrice(float $subscribePrice): self
    {
        $self = clone $this;
        $self['subscribePrice'] = $subscribePrice;

        return $self;
    }

    /**
     * @param list<Subscribe|SubscribeShape> $subscribes
     */
    public function withSubscribes(array $subscribes): self
    {
        $self = clone $this;
        $self['subscribes'] = $subscribes;

        return $self;
    }

    public function withUnsubscribeReason(string $unsubscribeReason): self
    {
        $self = clone $this;
        $self['unsubscribeReason'] = $unsubscribeReason;

        return $self;
    }
}
