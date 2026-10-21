<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryListArchiveResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryListArchiveResponse\Data\List_\Media;

/**
 * @phpstan-import-type MediaShape from \OnlyFansAPI\Stories\StoryListArchiveResponse\Data\List_\Media
 *
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   createdAt?: string|null,
 *   media?: list<Media|MediaShape>|null,
 *   question?: string|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $createdAt;

    /** @var list<Media>|null $media */
    #[Optional(list: Media::class)]
    public ?array $media;

    #[Optional(nullable: true)]
    public ?string $question;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Media|MediaShape>|null $media
     */
    public static function with(
        ?int $id = null,
        ?string $createdAt = null,
        ?array $media = null,
        ?string $question = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $media && $self['media'] = $media;
        null !== $question && $self['question'] = $question;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<Media|MediaShape> $media
     */
    public function withMedia(array $media): self
    {
        $self = clone $this;
        $self['media'] = $media;

        return $self;
    }

    public function withQuestion(?string $question): self
    {
        $self = clone $this;
        $self['question'] = $question;

        return $self;
    }
}
