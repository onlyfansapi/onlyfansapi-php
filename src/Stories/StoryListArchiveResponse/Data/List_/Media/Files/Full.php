<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\StoryListArchiveResponse\Data\List_\Media\Files;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type FullShape = array{
 *   height?: int|null,
 *   size?: int|null,
 *   sources?: list<mixed>|null,
 *   url?: string|null,
 *   width?: int|null,
 * }
 */
final class Full implements BaseModel
{
    /** @use SdkModel<FullShape> */
    use SdkModel;

    #[Optional]
    public ?int $height;

    #[Optional]
    public ?int $size;

    /** @var list<mixed>|null $sources */
    #[Optional(list: 'mixed')]
    public ?array $sources;

    #[Optional]
    public ?string $url;

    #[Optional]
    public ?int $width;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $sources
     */
    public static function with(
        ?int $height = null,
        ?int $size = null,
        ?array $sources = null,
        ?string $url = null,
        ?int $width = null,
    ): self {
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $size && $self['size'] = $size;
        null !== $sources && $self['sources'] = $sources;
        null !== $url && $self['url'] = $url;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * @param list<mixed> $sources
     */
    public function withSources(array $sources): self
    {
        $self = clone $this;
        $self['sources'] = $sources;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
