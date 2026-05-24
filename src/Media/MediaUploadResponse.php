<?php

declare(strict_types=1);

namespace Onlyfansapi\Media;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Media\MediaUploadResponse\Additional;
use Onlyfansapi\Media\MediaUploadResponse\Thumb;

/**
 * @phpstan-import-type AdditionalShape from \Onlyfansapi\Media\MediaUploadResponse\Additional
 * @phpstan-import-type ThumbShape from \Onlyfansapi\Media\MediaUploadResponse\Thumb
 *
 * @phpstan-type MediaUploadResponseShape = array{
 *   additional?: null|Additional|AdditionalShape,
 *   extra?: string|null,
 *   fileName?: string|null,
 *   host?: string|null,
 *   prefixedID?: string|null,
 *   processID?: string|null,
 *   sourceURL?: string|null,
 *   thumbs?: list<Thumb|ThumbShape>|null,
 * }
 */
final class MediaUploadResponse implements BaseModel
{
    /** @use SdkModel<MediaUploadResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Additional $additional;

    #[Optional]
    public ?string $extra;

    #[Optional('file_name')]
    public ?string $fileName;

    #[Optional]
    public ?string $host;

    #[Optional('prefixed_id')]
    public ?string $prefixedID;

    #[Optional('processId')]
    public ?string $processID;

    #[Optional('sourceUrl')]
    public ?string $sourceURL;

    /** @var list<Thumb>|null $thumbs */
    #[Optional(list: Thumb::class)]
    public ?array $thumbs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Additional|AdditionalShape|null $additional
     * @param list<Thumb|ThumbShape>|null $thumbs
     */
    public static function with(
        Additional|array|null $additional = null,
        ?string $extra = null,
        ?string $fileName = null,
        ?string $host = null,
        ?string $prefixedID = null,
        ?string $processID = null,
        ?string $sourceURL = null,
        ?array $thumbs = null,
    ): self {
        $self = new self;

        null !== $additional && $self['additional'] = $additional;
        null !== $extra && $self['extra'] = $extra;
        null !== $fileName && $self['fileName'] = $fileName;
        null !== $host && $self['host'] = $host;
        null !== $prefixedID && $self['prefixedID'] = $prefixedID;
        null !== $processID && $self['processID'] = $processID;
        null !== $sourceURL && $self['sourceURL'] = $sourceURL;
        null !== $thumbs && $self['thumbs'] = $thumbs;

        return $self;
    }

    /**
     * @param Additional|AdditionalShape $additional
     */
    public function withAdditional(Additional|array $additional): self
    {
        $self = clone $this;
        $self['additional'] = $additional;

        return $self;
    }

    public function withExtra(string $extra): self
    {
        $self = clone $this;
        $self['extra'] = $extra;

        return $self;
    }

    public function withFileName(string $fileName): self
    {
        $self = clone $this;
        $self['fileName'] = $fileName;

        return $self;
    }

    public function withHost(string $host): self
    {
        $self = clone $this;
        $self['host'] = $host;

        return $self;
    }

    public function withPrefixedID(string $prefixedID): self
    {
        $self = clone $this;
        $self['prefixedID'] = $prefixedID;

        return $self;
    }

    public function withProcessID(string $processID): self
    {
        $self = clone $this;
        $self['processID'] = $processID;

        return $self;
    }

    public function withSourceURL(string $sourceURL): self
    {
        $self = clone $this;
        $self['sourceURL'] = $sourceURL;

        return $self;
    }

    /**
     * @param list<Thumb|ThumbShape> $thumbs
     */
    public function withThumbs(array $thumbs): self
    {
        $self = clone $this;
        $self['thumbs'] = $thumbs;

        return $self;
    }
}
