<?php

declare(strict_types=1);

namespace Onlyfansapi\Bundles\BundleNewResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canBuy?: bool|null,
 *   discount?: int|null,
 *   duration?: int|null,
 *   price?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canBuy;

    #[Optional]
    public ?int $discount;

    #[Optional]
    public ?int $duration;

    #[Optional]
    public ?int $price;

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
        ?bool $canBuy = null,
        ?int $discount = null,
        ?int $duration = null,
        ?int $price = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canBuy && $self['canBuy'] = $canBuy;
        null !== $discount && $self['discount'] = $discount;
        null !== $duration && $self['duration'] = $duration;
        null !== $price && $self['price'] = $price;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanBuy(bool $canBuy): self
    {
        $self = clone $this;
        $self['canBuy'] = $canBuy;

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

    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }
}
