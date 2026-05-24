<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Relationships;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type BuyersShape = array{href?: string|null, method?: string|null}
 */
final class Buyers implements BaseModel
{
    /** @use SdkModel<BuyersShape> */
    use SdkModel;

    #[Optional]
    public ?string $href;

    #[Optional]
    public ?string $method;

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
        ?string $href = null,
        ?string $method = null
    ): self {
        $self = new self;

        null !== $href && $self['href'] = $href;
        null !== $method && $self['method'] = $method;

        return $self;
    }

    public function withHref(string $href): self
    {
        $self = clone $this;
        $self['href'] = $href;

        return $self;
    }

    public function withMethod(string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }
}
