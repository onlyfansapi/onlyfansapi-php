<?php

declare(strict_types=1);

namespace Onlyfansapi\Users\Restrict\RestrictDeleteResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type HeaderThumbsShape = array{w480?: string|null, w760?: string|null}
 */
final class HeaderThumbs implements BaseModel
{
    /** @use SdkModel<HeaderThumbsShape> */
    use SdkModel;

    #[Optional]
    public ?string $w480;

    #[Optional]
    public ?string $w760;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $w480 = null, ?string $w760 = null): self
    {
        $self = new self;

        null !== $w480 && $self['w480'] = $w480;
        null !== $w760 && $self['w760'] = $w760;

        return $self;
    }

    public function withW480(string $w480): self
    {
        $self = clone $this;
        $self['w480'] = $w480;

        return $self;
    }

    public function withW760(string $w760): self
    {
        $self = clone $this;
        $self['w760'] = $w760;

        return $self;
    }
}
