<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryCreateParams\Question;
use OnlyFansAPI\Stories\StoryCreateParams\Text;

/**
 * Post a new media or vault file to your story, optionally with text overlays, @mentions, and a question sticker. Overlay elements are rendered by OnlyFans on top of your story media at view time.
 *
 * @see OnlyFansAPI\Services\StoriesService::create()
 *
 * @phpstan-import-type QuestionShape from \OnlyFansAPI\Stories\StoryCreateParams\Question
 * @phpstan-import-type TextShape from \OnlyFansAPI\Stories\StoryCreateParams\Text
 *
 * @phpstan-type StoryCreateParamsShape = array{
 *   mediaFiles: list<string>,
 *   canvasHeight?: int|null,
 *   canvasWidth?: int|null,
 *   question?: null|Question|QuestionShape,
 *   texts?: list<Text|TextShape>|null,
 * }
 */
final class StoryCreateParams implements BaseModel
{
    /** @use SdkModel<StoryCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of media file upload prefixed_ids, or OF vault media IDs.
     *
     * @var list<string> $mediaFiles
     */
    #[Required(list: 'string')]
    public array $mediaFiles;

    /**
     * Canvas height overlay positions are relative to. Default `1920`.
     */
    #[Optional]
    public ?int $canvasHeight;

    /**
     * Canvas width overlay positions are relative to. Default `1080`.
     */
    #[Optional]
    public ?int $canvasWidth;

    /**
     * Interactive question sticker viewers can answer.
     */
    #[Optional]
    public ?Question $question;

    /**
     * Text and @mention overlays.
     *
     * @var list<Text>|null $texts
     */
    #[Optional(list: Text::class)]
    public ?array $texts;

    /**
     * `new StoryCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StoryCreateParams::with(mediaFiles: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StoryCreateParams)->withMediaFiles(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $mediaFiles
     * @param Question|QuestionShape|null $question
     * @param list<Text|TextShape>|null $texts
     */
    public static function with(
        array $mediaFiles,
        ?int $canvasHeight = null,
        ?int $canvasWidth = null,
        Question|array|null $question = null,
        ?array $texts = null,
    ): self {
        $self = new self;

        $self['mediaFiles'] = $mediaFiles;

        null !== $canvasHeight && $self['canvasHeight'] = $canvasHeight;
        null !== $canvasWidth && $self['canvasWidth'] = $canvasWidth;
        null !== $question && $self['question'] = $question;
        null !== $texts && $self['texts'] = $texts;

        return $self;
    }

    /**
     * Array of media file upload prefixed_ids, or OF vault media IDs.
     *
     * @param list<string> $mediaFiles
     */
    public function withMediaFiles(array $mediaFiles): self
    {
        $self = clone $this;
        $self['mediaFiles'] = $mediaFiles;

        return $self;
    }

    /**
     * Canvas height overlay positions are relative to. Default `1920`.
     */
    public function withCanvasHeight(int $canvasHeight): self
    {
        $self = clone $this;
        $self['canvasHeight'] = $canvasHeight;

        return $self;
    }

    /**
     * Canvas width overlay positions are relative to. Default `1080`.
     */
    public function withCanvasWidth(int $canvasWidth): self
    {
        $self = clone $this;
        $self['canvasWidth'] = $canvasWidth;

        return $self;
    }

    /**
     * Interactive question sticker viewers can answer.
     *
     * @param Question|QuestionShape $question
     */
    public function withQuestion(Question|array $question): self
    {
        $self = clone $this;
        $self['question'] = $question;

        return $self;
    }

    /**
     * Text and @mention overlays.
     *
     * @param list<Text|TextShape> $texts
     */
    public function withTexts(array $texts): self
    {
        $self = clone $this;
        $self['texts'] = $texts;

        return $self;
    }
}
