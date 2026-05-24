<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkGetResponse\Data\Links;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type RelatedShape = array{
 *   spenders?: string|null, subscribers?: string|null
 * }
 */
final class Related implements BaseModel
{
    /** @use SdkModel<RelatedShape> */
    use SdkModel;

    #[Optional]
    public ?string $spenders;

    #[Optional]
    public ?string $subscribers;

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
        ?string $spenders = null,
        ?string $subscribers = null
    ): self {
        $self = new self;

        null !== $spenders && $self['spenders'] = $spenders;
        null !== $subscribers && $self['subscribers'] = $subscribers;

        return $self;
    }

    public function withSpenders(string $spenders): self
    {
        $self = clone $this;
        $self['spenders'] = $spenders;

        return $self;
    }

    public function withSubscribers(string $subscribers): self
    {
        $self = clone $this;
        $self['subscribers'] = $subscribers;

        return $self;
    }
}
