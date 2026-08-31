<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember4\Media;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ThumbShape = array{id?: int|null, url?: string|null}
 */
final class Thumb implements BaseModel
{
    /** @use SdkModel<ThumbShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $id = null, ?string $url = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
