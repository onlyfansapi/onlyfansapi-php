<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Create a new Tracking Link for the account.
 *
 * @see OnlyFansAPI\Services\TrackingLinksService::create()
 *
 * @phpstan-type TrackingLinkCreateParamsShape = array{
 *   name: string, tags?: list<string>|null
 * }
 */
final class TrackingLinkCreateParams implements BaseModel
{
    /** @use SdkModel<TrackingLinkCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the Tracking Link.
     */
    #[Required]
    public string $name;

    /**
     * Array of tag names to add to the tracking link.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * `new TrackingLinkCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackingLinkCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackingLinkCreateParams)->withName(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $tags
     */
    public static function with(string $name, ?array $tags = null): self
    {
        $self = new self;

        $self['name'] = $name;

        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * The name of the Tracking Link.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Array of tag names to add to the tracking link.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
