<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Create a new Tracking Link for the account.
 *
 * @see Onlyfansapi\Services\TrackingLinksService::create()
 *
 * @phpstan-type TrackingLinkCreateParamsShape = array{name: string}
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
     */
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

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
}
