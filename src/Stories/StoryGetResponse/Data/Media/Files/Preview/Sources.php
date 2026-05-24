<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\StoryGetResponse\Data\Media\Files\Preview;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type SourcesShape = array{w150?: string|null}
 */
final class Sources implements BaseModel
{
    /** @use SdkModel<SourcesShape> */
    use SdkModel;

    #[Optional]
    public ?string $w150;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $w150 = null): self
    {
        $self = new self;

        null !== $w150 && $self['w150'] = $w150;

        return $self;
    }

    public function withW150(string $w150): self
    {
        $self = clone $this;
        $self['w150'] = $w150;

        return $self;
    }
}
