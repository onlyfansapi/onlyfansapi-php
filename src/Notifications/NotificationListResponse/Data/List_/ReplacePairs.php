<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\NotificationListResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReplacePairsShape = array{
 *   _price?: string|null, _subscriberLink?: string|null
 * }
 */
final class ReplacePairs implements BaseModel
{
    /** @use SdkModel<ReplacePairsShape> */
    use SdkModel;

    #[Optional('{PRICE}')]
    public ?string $_price;

    #[Optional('{SUBSCRIBER_LINK}')]
    public ?string $_subscriberLink;

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
        ?string $_price = null,
        ?string $_subscriberLink = null
    ): self {
        $self = new self;

        null !== $_price && $self['_price'] = $_price;
        null !== $_subscriberLink && $self['_subscriberLink'] = $_subscriberLink;

        return $self;
    }

    public function withPrice(string $_price): self
    {
        $self = clone $this;
        $self['_price'] = $_price;

        return $self;
    }

    public function withSubscriberLink(string $_subscriberLink): self
    {
        $self = clone $this;
        $self['_subscriberLink'] = $_subscriberLink;

        return $self;
    }
}
