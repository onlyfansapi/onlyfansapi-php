<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging\MassMessagingGetOverviewResponse\Data\Item\Media;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type VideoSourcesShape = array{_240?: string|null, _720?: string|null}
 */
final class VideoSources implements BaseModel
{
    /** @use SdkModel<VideoSourcesShape> */
    use SdkModel;

    #[Optional('240', nullable: true)]
    public ?string $_240;

    #[Optional('720', nullable: true)]
    public ?string $_720;

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
        ?string $_240 = null,
        ?string $_720 = null
    ): self {
        $self = new self;

        null !== $_240 && $self['_240'] = $_240;
        null !== $_720 && $self['_720'] = $_720;

        return $self;
    }

    public function with240(?string $_240): self
    {
        $self = clone $this;
        $self['_240'] = $_240;

        return $self;
    }

    public function with720(?string $_720): self
    {
        $self = clone $this;
        $self['_720'] = $_720;

        return $self;
    }
}
