<?php

declare(strict_types=1);

namespace OnlyFansAPI\SavedForLater\Posts\PostListResponse\Data\List_;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type EntityShape = array{
 *   id?: int|null,
 *   canDelete?: bool|null,
 *   canEdit?: bool|null,
 *   canToggleFavorite?: bool|null,
 *   canViewMedia?: bool|null,
 *   isMarkdownDisabled?: bool|null,
 *   isMediaReady?: bool|null,
 *   isOpened?: bool|null,
 *   isPublishedWithPeriod?: bool|null,
 *   postedAt?: string|null,
 *   postedAtPrecise?: string|null,
 *   rawText?: string|null,
 *   responseType?: string|null,
 *   text?: string|null,
 *   tipsAmount?: string|null,
 * }
 */
final class Entity implements BaseModel
{
    /** @use SdkModel<EntityShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

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
    public ?bool $isMediaReady;

    #[Optional]
    public ?bool $isOpened;

    #[Optional]
    public ?bool $isPublishedWithPeriod;

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
     */
    public static function with(
        ?int $id = null,
        ?bool $canDelete = null,
        ?bool $canEdit = null,
        ?bool $canToggleFavorite = null,
        ?bool $canViewMedia = null,
        ?bool $isMarkdownDisabled = null,
        ?bool $isMediaReady = null,
        ?bool $isOpened = null,
        ?bool $isPublishedWithPeriod = null,
        ?string $postedAt = null,
        ?string $postedAtPrecise = null,
        ?string $rawText = null,
        ?string $responseType = null,
        ?string $text = null,
        ?string $tipsAmount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canDelete && $self['canDelete'] = $canDelete;
        null !== $canEdit && $self['canEdit'] = $canEdit;
        null !== $canToggleFavorite && $self['canToggleFavorite'] = $canToggleFavorite;
        null !== $canViewMedia && $self['canViewMedia'] = $canViewMedia;
        null !== $isMarkdownDisabled && $self['isMarkdownDisabled'] = $isMarkdownDisabled;
        null !== $isMediaReady && $self['isMediaReady'] = $isMediaReady;
        null !== $isOpened && $self['isOpened'] = $isOpened;
        null !== $isPublishedWithPeriod && $self['isPublishedWithPeriod'] = $isPublishedWithPeriod;
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

    public function withIsMediaReady(bool $isMediaReady): self
    {
        $self = clone $this;
        $self['isMediaReady'] = $isMediaReady;

        return $self;
    }

    public function withIsOpened(bool $isOpened): self
    {
        $self = clone $this;
        $self['isOpened'] = $isOpened;

        return $self;
    }

    public function withIsPublishedWithPeriod(bool $isPublishedWithPeriod): self
    {
        $self = clone $this;
        $self['isPublishedWithPeriod'] = $isPublishedWithPeriod;

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
