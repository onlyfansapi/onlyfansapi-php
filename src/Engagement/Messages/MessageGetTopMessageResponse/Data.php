<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases;

/**
 * @phpstan-import-type PurchasesShape from \Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases
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
