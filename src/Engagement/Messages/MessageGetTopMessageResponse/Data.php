<?php

declare(strict_types=1);

namespace OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases;

/**
 * @phpstan-import-type PurchasesShape from \OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases
 *
 * @phpstan-type DataShape = array{purchases?: null|Purchases|PurchasesShape}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Purchases $purchases;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Purchases|PurchasesShape|null $purchases
     */
    public static function with(Purchases|array|null $purchases = null): self
    {
        $self = new self;

        null !== $purchases && $self['purchases'] = $purchases;

        return $self;
    }

    /**
     * @param Purchases|PurchasesShape $purchases
     */
    public function withPurchases(Purchases|array $purchases): self
    {
        $self = clone $this;
        $self['purchases'] = $purchases;

        return $self;
    }
}
