<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListExpiredResponse\Data\List_;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscribedOnDataShape = array{
 *   discountFinishedAt?: string|null,
 *   discountPercent?: int|null,
 *   discountPeriod?: int|null,
 *   discountStartedAt?: string|null,
 *   duration?: string|null,
 *   expiredAt?: string|null,
 *   hasActivePaidSubscriptions?: bool|null,
 *   isMuted?: bool|null,
 *   lastActivity?: string|null,
 *   messagesSumm?: int|null,
 *   newPrice?: int|null,
 *   postsSumm?: int|null,
 *   price?: int|null,
 *   recommendations?: int|null,
 *   regularPrice?: int|null,
 *   renewedAt?: string|null,
 *   status?: string|null,
 *   streamsSumm?: int|null,
 *   subscribeAt?: string|null,
 *   subscribePrice?: int|null,
 *   subscribes?: list<mixed>|null,
 *   subscribesSumm?: int|null,
 *   tipsSumm?: int|null,
 *   totalSumm?: int|null,
 *   unsubscribeReason?: string|null,
 * }
 */
final class SubscribedOnData implements BaseModel
{
    /** @use SdkModel<SubscribedOnDataShape> */
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
    public ?string $lastActivity;

    #[Optional]
    public ?int $messagesSumm;

    #[Optional]
    public ?int $newPrice;

    #[Optional]
    public ?int $postsSumm;

    #[Optional]
    public ?int $price;

    #[Optional]
    public ?int $recommendations;

    #[Optional]
    public ?int $regularPrice;

    #[Optional]
    public ?string $renewedAt;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?int $streamsSumm;

    #[Optional]
    public ?string $subscribeAt;

    #[Optional]
    public ?int $subscribePrice;

    /** @var list<mixed>|null $subscribes */
    #[Optional(list: 'mixed')]
    public ?array $subscribes;

    #[Optional]
    public ?int $subscribesSumm;

    #[Optional]
    public ?int $tipsSumm;

    #[Optional]
    public ?int $totalSumm;

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
     * @param list<mixed>|null $subscribes
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
        ?string $lastActivity = null,
        ?int $messagesSumm = null,
        ?int $newPrice = null,
        ?int $postsSumm = null,
        ?int $price = null,
        ?int $recommendations = null,
        ?int $regularPrice = null,
        ?string $renewedAt = null,
        ?string $status = null,
        ?int $streamsSumm = null,
        ?string $subscribeAt = null,
        ?int $subscribePrice = null,
        ?array $subscribes = null,
        ?int $subscribesSumm = null,
        ?int $tipsSumm = null,
        ?int $totalSumm = null,
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
        null !== $lastActivity && $self['lastActivity'] = $lastActivity;
        null !== $messagesSumm && $self['messagesSumm'] = $messagesSumm;
        null !== $newPrice && $self['newPrice'] = $newPrice;
        null !== $postsSumm && $self['postsSumm'] = $postsSumm;
        null !== $price && $self['price'] = $price;
        null !== $recommendations && $self['recommendations'] = $recommendations;
        null !== $regularPrice && $self['regularPrice'] = $regularPrice;
        null !== $renewedAt && $self['renewedAt'] = $renewedAt;
        null !== $status && $self['status'] = $status;
        null !== $streamsSumm && $self['streamsSumm'] = $streamsSumm;
        null !== $subscribeAt && $self['subscribeAt'] = $subscribeAt;
        null !== $subscribePrice && $self['subscribePrice'] = $subscribePrice;
        null !== $subscribes && $self['subscribes'] = $subscribes;
        null !== $subscribesSumm && $self['subscribesSumm'] = $subscribesSumm;
        null !== $tipsSumm && $self['tipsSumm'] = $tipsSumm;
        null !== $totalSumm && $self['totalSumm'] = $totalSumm;
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

    public function withLastActivity(string $lastActivity): self
    {
        $self = clone $this;
        $self['lastActivity'] = $lastActivity;

        return $self;
    }

    public function withMessagesSumm(int $messagesSumm): self
    {
        $self = clone $this;
        $self['messagesSumm'] = $messagesSumm;

        return $self;
    }

    public function withNewPrice(int $newPrice): self
    {
        $self = clone $this;
        $self['newPrice'] = $newPrice;

        return $self;
    }

    public function withPostsSumm(int $postsSumm): self
    {
        $self = clone $this;
        $self['postsSumm'] = $postsSumm;

        return $self;
    }

    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withRecommendations(int $recommendations): self
    {
        $self = clone $this;
        $self['recommendations'] = $recommendations;

        return $self;
    }

    public function withRegularPrice(int $regularPrice): self
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

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withStreamsSumm(int $streamsSumm): self
    {
        $self = clone $this;
        $self['streamsSumm'] = $streamsSumm;

        return $self;
    }

    public function withSubscribeAt(string $subscribeAt): self
    {
        $self = clone $this;
        $self['subscribeAt'] = $subscribeAt;

        return $self;
    }

    public function withSubscribePrice(int $subscribePrice): self
    {
        $self = clone $this;
        $self['subscribePrice'] = $subscribePrice;

        return $self;
    }

    /**
     * @param list<mixed> $subscribes
     */
    public function withSubscribes(array $subscribes): self
    {
        $self = clone $this;
        $self['subscribes'] = $subscribes;

        return $self;
    }

    public function withSubscribesSumm(int $subscribesSumm): self
    {
        $self = clone $this;
        $self['subscribesSumm'] = $subscribesSumm;

        return $self;
    }

    public function withTipsSumm(int $tipsSumm): self
    {
        $self = clone $this;
        $self['tipsSumm'] = $tipsSumm;

        return $self;
    }

    public function withTotalSumm(int $totalSumm): self
    {
        $self = clone $this;
        $self['totalSumm'] = $totalSumm;

        return $self;
    }

    public function withUnsubscribeReason(string $unsubscribeReason): self
    {
        $self = clone $this;
        $self['unsubscribeReason'] = $unsubscribeReason;

        return $self;
    }
}
