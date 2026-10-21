<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data\Row\SubscriptionInsights;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type CurrentSubscriptionShape = array{
 *   action?: string|null,
 *   isFree?: bool|null,
 *   price?: int|null,
 *   regularPrice?: int|null,
 *   type?: string|null,
 * }
 */
final class CurrentSubscription implements BaseModel
{
    /** @use SdkModel<CurrentSubscriptionShape> */
    use SdkModel;

    #[Optional]
    public ?string $action;

    #[Optional('is_free')]
    public ?bool $isFree;

    #[Optional]
    public ?int $price;

    #[Optional('regular_price')]
    public ?int $regularPrice;

    #[Optional]
    public ?string $type;

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
        ?string $action = null,
        ?bool $isFree = null,
        ?int $price = null,
        ?int $regularPrice = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $isFree && $self['isFree'] = $isFree;
        null !== $price && $self['price'] = $price;
        null !== $regularPrice && $self['regularPrice'] = $regularPrice;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withAction(string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    public function withIsFree(bool $isFree): self
    {
        $self = clone $this;
        $self['isFree'] = $isFree;

        return $self;
    }

    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withRegularPrice(int $regularPrice): self
    {
        $self = clone $this;
        $self['regularPrice'] = $regularPrice;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
