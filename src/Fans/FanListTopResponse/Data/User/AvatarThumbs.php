<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListTopResponse\Data\User;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type AvatarThumbsShape = array{c144?: string|null, c50?: string|null}
 */
final class AvatarThumbs implements BaseModel
{
    /** @use SdkModel<AvatarThumbsShape> */
    use SdkModel;

    #[Optional]
    public ?string $c144;

    #[Optional]
    public ?string $c50;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $c144 = null, ?string $c50 = null): self
    {
        $self = new self;

        null !== $c144 && $self['c144'] = $c144;
        null !== $c50 && $self['c50'] = $c50;

        return $self;
    }

    public function withC144(string $c144): self
    {
        $self = clone $this;
        $self['c144'] = $c144;

        return $self;
    }

    public function withC50(string $c50): self
    {
        $self = clone $this;
        $self['c50'] = $c50;

        return $self;
    }
}
