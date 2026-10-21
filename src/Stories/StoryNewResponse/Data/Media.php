<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryNewResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryNewResponse\Data\Media\Files;

/**
 * @phpstan-import-type FilesShape from \OnlyFansAPI\Stories\StoryNewResponse\Data\Media\Files
 *
 * @phpstan-type MediaShape = array{
 *   id?: int|null,
 *   canView?: bool|null,
 *   convertedToVideo?: bool|null,
 *   createdAt?: string|null,
 *   duration?: int|null,
 *   files?: null|Files|FilesShape,
 *   hasCustomPreview?: bool|null,
 *   hasError?: bool|null,
 *   isReady?: bool|null,
 *   type?: string|null,
 * }
 */
final class Media implements BaseModel
{
    /** @use SdkModel<MediaShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canView;

    #[Optional]
    public ?bool $convertedToVideo;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?int $duration;

    #[Optional]
    public ?Files $files;

    #[Optional]
    public ?bool $hasCustomPreview;

    #[Optional]
    public ?bool $hasError;

    #[Optional]
    public ?bool $isReady;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Files|FilesShape|null $files
     */
    public static function with(
        ?int $id = null,
        ?bool $canView = null,
        ?bool $convertedToVideo = null,
        ?string $createdAt = null,
        ?int $duration = null,
        Files|array|null $files = null,
        ?bool $hasCustomPreview = null,
        ?bool $hasError = null,
        ?bool $isReady = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canView && $self['canView'] = $canView;
        null !== $convertedToVideo && $self['convertedToVideo'] = $convertedToVideo;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $duration && $self['duration'] = $duration;
        null !== $files && $self['files'] = $files;
        null !== $hasCustomPreview && $self['hasCustomPreview'] = $hasCustomPreview;
        null !== $hasError && $self['hasError'] = $hasError;
        null !== $isReady && $self['isReady'] = $isReady;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanView(bool $canView): self
    {
        $self = clone $this;
        $self['canView'] = $canView;

        return $self;
    }

    public function withConvertedToVideo(bool $convertedToVideo): self
    {
        $self = clone $this;
        $self['convertedToVideo'] = $convertedToVideo;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * @param Files|FilesShape $files
     */
    public function withFiles(Files|array $files): self
    {
        $self = clone $this;
        $self['files'] = $files;

        return $self;
    }

    public function withHasCustomPreview(bool $hasCustomPreview): self
    {
        $self = clone $this;
        $self['hasCustomPreview'] = $hasCustomPreview;

        return $self;
    }

    public function withHasError(bool $hasError): self
    {
        $self = clone $this;
        $self['hasError'] = $hasError;

        return $self;
    }

    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
