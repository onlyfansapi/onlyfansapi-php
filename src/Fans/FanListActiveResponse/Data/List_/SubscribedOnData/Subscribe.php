<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\FanListActiveResponse\Data\List_\SubscribedOnData;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscribeShape = array{
 *   id?: int|null,
 *   action?: string|null,
 *   cancelDate?: string|null,
 *   date?: string|null,
 *   discount?: int|null,
 *   duration?: int|null,
 *   earningID?: int|null,
 *   expireDate?: string|null,
 *   isCurrent?: bool|null,
 *   offerEnd?: string|null,
 *   offerStart?: string|null,
 *   price?: int|null,
 *   regularPrice?: float|null,
 *   startDate?: string|null,
 *   subscriberID?: int|null,
 *   type?: string|null,
 *   userID?: int|null,
 * }
 */
final class Subscribe implements BaseModel
{
    /** @use SdkModel<SubscribeShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $action;

    #[Optional(nullable: true)]
    public ?string $cancelDate;

    #[Optional]
    public ?string $date;

    #[Optional]
    public ?int $discount;

    #[Optional]
    public ?int $duration;

    #[Optional('earningId')]
    public ?int $earningID;

    #[Optional]
    public ?string $expireDate;

    #[Optional]
    public ?bool $isCurrent;

    #[Optional]
    public ?string $offerEnd;

    #[Optional]
    public ?string $offerStart;

    #[Optional]
    public ?int $price;

    #[Optional]
    public ?float $regularPrice;

    #[Optional]
    public ?string $startDate;

    #[Optional('subscriberId')]
    public ?int $subscriberID;

    #[Optional]
    public ?string $type;

    #[Optional('userId')]
    public ?int $userID;

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
        ?string $action = null,
        ?string $cancelDate = null,
        ?string $date = null,
        ?int $discount = null,
        ?int $duration = null,
        ?int $earningID = null,
        ?string $expireDate = null,
        ?bool $isCurrent = null,
        ?string $offerEnd = null,
        ?string $offerStart = null,
        ?int $price = null,
        ?float $regularPrice = null,
        ?string $startDate = null,
        ?int $subscriberID = null,
        ?string $type = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $action && $self['action'] = $action;
        null !== $cancelDate && $self['cancelDate'] = $cancelDate;
        null !== $date && $self['date'] = $date;
        null !== $discount && $self['discount'] = $discount;
        null !== $duration && $self['duration'] = $duration;
        null !== $earningID && $self['earningID'] = $earningID;
        null !== $expireDate && $self['expireDate'] = $expireDate;
        null !== $isCurrent && $self['isCurrent'] = $isCurrent;
        null !== $offerEnd && $self['offerEnd'] = $offerEnd;
        null !== $offerStart && $self['offerStart'] = $offerStart;
        null !== $price && $self['price'] = $price;
        null !== $regularPrice && $self['regularPrice'] = $regularPrice;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $subscriberID && $self['subscriberID'] = $subscriberID;
        null !== $type && $self['type'] = $type;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAction(string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    public function withCancelDate(?string $cancelDate): self
    {
        $self = clone $this;
        $self['cancelDate'] = $cancelDate;

        return $self;
    }

    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }

    public function withDiscount(int $discount): self
    {
        $self = clone $this;
        $self['discount'] = $discount;

        return $self;
    }

    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    public function withEarningID(int $earningID): self
    {
        $self = clone $this;
        $self['earningID'] = $earningID;

        return $self;
    }

    public function withExpireDate(string $expireDate): self
    {
        $self = clone $this;
        $self['expireDate'] = $expireDate;

        return $self;
    }

    public function withIsCurrent(bool $isCurrent): self
    {
        $self = clone $this;
        $self['isCurrent'] = $isCurrent;

        return $self;
    }

    public function withOfferEnd(string $offerEnd): self
    {
        $self = clone $this;
        $self['offerEnd'] = $offerEnd;

        return $self;
    }

    public function withOfferStart(string $offerStart): self
    {
        $self = clone $this;
        $self['offerStart'] = $offerStart;

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

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    public function withSubscriberID(int $subscriberID): self
    {
        $self = clone $this;
        $self['subscriberID'] = $subscriberID;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
