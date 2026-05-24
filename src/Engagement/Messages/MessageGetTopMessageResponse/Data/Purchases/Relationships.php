<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Relationships\Buyers;

/**
 * @phpstan-import-type BuyersShape from \Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Relationships\Buyers
 *
 * @phpstan-type RelationshipsShape = array{buyers?: null|Buyers|BuyersShape}
 */
final class Relationships implements BaseModel
{
    /** @use SdkModel<RelationshipsShape> */
    use SdkModel;

    #[Optional]
    public ?Buyers $buyers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Buyers|BuyersShape|null $buyers
     */
    public static function with(Buyers|array|null $buyers = null): self
    {
        $self = new self;

        null !== $buyers && $self['buyers'] = $buyers;

        return $self;
    }

    /**
     * @param Buyers|BuyersShape $buyers
     */
    public function withBuyers(Buyers|array $buyers): self
    {
        $self = clone $this;
        $self['buyers'] = $buyers;

        return $self;
    }
}
