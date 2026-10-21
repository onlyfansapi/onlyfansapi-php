<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Comments\CommentNewResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author;

/**
 * @phpstan-import-type AuthorShape from \OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   author?: null|Author|AuthorShape,
 *   canLike?: bool|null,
 *   changedAt?: string|null,
 *   giphyID?: string|null,
 *   isLiked?: bool|null,
 *   isLikedByAuthor?: bool|null,
 *   isPinned?: bool|null,
 *   likesCount?: int|null,
 *   postedAt?: string|null,
 *   text?: string|null,
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
    public ?bool $canLike;

    #[Optional]
    public ?string $changedAt;

    #[Optional('giphyId', nullable: true)]
    public ?string $giphyID;

    #[Optional]
    public ?bool $isLiked;

    #[Optional]
    public ?bool $isLikedByAuthor;

    #[Optional]
    public ?bool $isPinned;

    #[Optional]
    public ?int $likesCount;

    #[Optional]
    public ?string $postedAt;

    #[Optional]
    public ?string $text;

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
     */
    public static function with(
        ?int $id = null,
        Author|array|null $author = null,
        ?bool $canLike = null,
        ?string $changedAt = null,
        ?string $giphyID = null,
        ?bool $isLiked = null,
        ?bool $isLikedByAuthor = null,
        ?bool $isPinned = null,
        ?int $likesCount = null,
        ?string $postedAt = null,
        ?string $text = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $author && $self['author'] = $author;
        null !== $canLike && $self['canLike'] = $canLike;
        null !== $changedAt && $self['changedAt'] = $changedAt;
        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $isLiked && $self['isLiked'] = $isLiked;
        null !== $isLikedByAuthor && $self['isLikedByAuthor'] = $isLikedByAuthor;
        null !== $isPinned && $self['isPinned'] = $isPinned;
        null !== $likesCount && $self['likesCount'] = $likesCount;
        null !== $postedAt && $self['postedAt'] = $postedAt;
        null !== $text && $self['text'] = $text;

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

    public function withCanLike(bool $canLike): self
    {
        $self = clone $this;
        $self['canLike'] = $canLike;

        return $self;
    }

    public function withChangedAt(string $changedAt): self
    {
        $self = clone $this;
        $self['changedAt'] = $changedAt;

        return $self;
    }

    public function withGiphyID(?string $giphyID): self
    {
        $self = clone $this;
        $self['giphyID'] = $giphyID;

        return $self;
    }

    public function withIsLiked(bool $isLiked): self
    {
        $self = clone $this;
        $self['isLiked'] = $isLiked;

        return $self;
    }

    public function withIsLikedByAuthor(bool $isLikedByAuthor): self
    {
        $self = clone $this;
        $self['isLikedByAuthor'] = $isLikedByAuthor;

        return $self;
    }

    public function withIsPinned(bool $isPinned): self
    {
        $self = clone $this;
        $self['isPinned'] = $isPinned;

        return $self;
    }

    public function withLikesCount(int $likesCount): self
    {
        $self = clone $this;
        $self['likesCount'] = $likesCount;

        return $self;
    }

    public function withPostedAt(string $postedAt): self
    {
        $self = clone $this;
        $self['postedAt'] = $postedAt;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
