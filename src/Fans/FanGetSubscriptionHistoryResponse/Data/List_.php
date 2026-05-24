<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanGetSubscriptionHistoryResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListShape = array{
 *   expireDate?: string|null, price?: float|null, subscribeDate?: string|null
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?string $expireDate;

    #[Optional]
    public ?float $price;

    #[Optional]
    public ?string $subscribeDate;

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
        ?string $expireDate = null,
        ?float $price = null,
        ?string $subscribeDate = null
    ): self {
        $self = new self;

        null !== $expireDate && $self['expireDate'] = $expireDate;
        null !== $price && $self['price'] = $price;
        null !== $subscribeDate && $self['subscribeDate'] = $subscribeDate;

        return $self;
    }

    public function withExpireDate(string $expireDate): self
    {
        $self = clone $this;
        $self['expireDate'] = $expireDate;

        return $self;
    }

    public function withPrice(float $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withSubscribeDate(string $subscribeDate): self
    {
        $self = clone $this;
        $self['subscribeDate'] = $subscribeDate;

        return $self;
    }
}
