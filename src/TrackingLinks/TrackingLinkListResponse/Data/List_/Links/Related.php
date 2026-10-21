<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\TrackingLinkListResponse\Data\List_\Links;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type RelatedShape = array{subscribers?: string|null}
 */
final class Related implements BaseModel
{
    /** @use SdkModel<RelatedShape> */
    use SdkModel;

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
    public static function with(?string $subscribers = null): self
    {
        $self = new self;

        null !== $subscribers && $self['subscribers'] = $subscribers;

        return $self;
    }

    public function withSubscribers(string $subscribers): self
    {
        $self = clone $this;
        $self['subscribers'] = $subscribers;

        return $self;
    }
}
