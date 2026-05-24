<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\PostNewResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Posts\PostNewResponse\Data\Author;
use Onlyfansapi\Posts\PostNewResponse\Data\Media;

/**
 * @phpstan-import-type AuthorShape from \Onlyfansapi\Posts\PostNewResponse\Data\Author
 * @phpstan-import-type MediaShape from \Onlyfansapi\Posts\PostNewResponse\Data\Media
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   author?: null|Author|AuthorShape,
 *   canComment?: bool|null,
 *   canDelete?: bool|null,
 *   canEdit?: bool|null,
 *   canToggleFavorite?: bool|null,
 *   canViewMedia?: bool|null,
 *   isMarkdownDisabled?: bool|null,
 *   isOpened?: bool|null,
 *   media?: list<Media|MediaShape>|null,
 *   mediaCount?: int|null,
 *   postedAt?: string|null,
 *   postedAtPrecise?: string|null,
 *   rawText?: string|null,
 *   responseType?: string|null,
 *   text?: string|null,
 *   tipsAmount?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?Author $author;

    #[Optional]
    public ?bool $canComment;

    #[Optional]
    public ?bool $canDelete;

    #[Optional]
    public ?bool $canEdit;

    #[Optional]
    public ?bool $canToggleFavorite;

    #[Optional]
    public ?bool $canViewMedia;

    #[Optional]
    public ?bool $isMarkdownDisabled;

    #[Optional]
    public ?bool $isOpened;

    /** @var list<Media>|null $media */
    #[Optional(list: Media::class)]
    public ?array $media;

    #[Optional]
    public ?int $mediaCount;

    #[Optional]
    public ?string $postedAt;

    #[Optional]
    public ?string $postedAtPrecise;

    #[Optional]
    public ?string $rawText;

    #[Optional]
    public ?string $responseType;

    #[Optional]
    public ?string $text;

    #[Optional]
    public ?string $tipsAmount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Author|AuthorShape|null $author
     * @param list<Media|MediaShape>|null $media
     */
    public static function with(
        ?int $id = null,
        Author|array|null $author = null,
        ?bool $canComment = null,
        ?bool $canDelete = null,
        ?bool $canEdit = null,
        ?bool $canToggleFavorite = null,
        ?bool $canViewMedia = null,
        ?bool $isMarkdownDisabled = null,
        ?bool $isOpened = null,
        ?array $media = null,
        ?int $mediaCount = null,
        ?string $postedAt = null,
        ?string $postedAtPrecise = null,
        ?string $rawText = null,
        ?string $responseType = null,
        ?string $text = null,
        ?string $tipsAmount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $author && $self['author'] = $author;
        null !== $canComment && $self['canComment'] = $canComment;
        null !== $canDelete && $self['canDelete'] = $canDelete;
        null !== $canEdit && $self['canEdit'] = $canEdit;
        null !== $canToggleFavorite && $self['canToggleFavorite'] = $canToggleFavorite;
        null !== $canViewMedia && $self['canViewMedia'] = $canViewMedia;
        null !== $isMarkdownDisabled && $self['isMarkdownDisabled'] = $isMarkdownDisabled;
        null !== $isOpened && $self['isOpened'] = $isOpened;
        null !== $media && $self['media'] = $media;
        null !== $mediaCount && $self['mediaCount'] = $mediaCount;
        null !== $postedAt && $self['postedAt'] = $postedAt;
        null !== $postedAtPrecise && $self['postedAtPrecise'] = $postedAtPrecise;
        null !== $rawText && $self['rawText'] = $rawText;
        null !== $responseType && $self['responseType'] = $responseType;
        null !== $text && $self['text'] = $text;
        null !== $tipsAmount && $self['tipsAmount'] = $tipsAmount;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Author|AuthorShape $author
     */
    public function withAuthor(Author|array $author): self
    {
        $self = clone $this;
        $self['author'] = $author;

        return $self;
    }

    public function withCanComment(bool $canComment): self
    {
        $self = clone $this;
        $self['canComment'] = $canComment;

        return $self;
    }

    public function withCanDelete(bool $canDelete): self
    {
        $self = clone $this;
        $self['canDelete'] = $canDelete;

        return $self;
    }

    public function withCanEdit(bool $canEdit): self
    {
        $self = clone $this;
        $self['canEdit'] = $canEdit;

        return $self;
    }

    public function withCanToggleFavorite(bool $canToggleFavorite): self
    {
        $self = clone $this;
        $self['canToggleFavorite'] = $canToggleFavorite;

        return $self;
    }

    public function withCanViewMedia(bool $canViewMedia): self
    {
        $self = clone $this;
        $self['canViewMedia'] = $canViewMedia;

        return $self;
    }

    public function withIsMarkdownDisabled(bool $isMarkdownDisabled): self
    {
        $self = clone $this;
        $self['isMarkdownDisabled'] = $isMarkdownDisabled;

        return $self;
    }

    public function withIsOpened(bool $isOpened): self
    {
        $self = clone $this;
        $self['isOpened'] = $isOpened;

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

    public function withMediaCount(int $mediaCount): self
    {
        $self = clone $this;
        $self['mediaCount'] = $mediaCount;

        return $self;
    }

    public function withPostedAt(string $postedAt): self
    {
        $self = clone $this;
        $self['postedAt'] = $postedAt;

        return $self;
    }

    public function withPostedAtPrecise(string $postedAtPrecise): self
    {
        $self = clone $this;
        $self['postedAtPrecise'] = $postedAtPrecise;

        return $self;
    }

    public function withRawText(string $rawText): self
    {
        $self = clone $this;
        $self['rawText'] = $rawText;

        return $self;
    }

    public function withResponseType(string $responseType): self
    {
        $self = clone $this;
        $self['responseType'] = $responseType;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withTipsAmount(string $tipsAmount): self
    {
        $self = clone $this;
        $self['tipsAmount'] = $tipsAmount;

        return $self;
    }
}
