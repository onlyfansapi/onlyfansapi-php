<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Comments;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Create a comment on one of your posts.
 *
 * @see OnlyFansAPI\Services\Posts\CommentsService::create()
 *
 * @phpstan-type CommentCreateParamsShape = array{
 *   account: string, text: string, answerTo?: int|null, giphyID?: string|null
 * }
 */
final class CommentCreateParams implements BaseModel
{
    /** @use SdkModel<CommentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The text of the comment.
     */
    #[Required]
    public string $text;

    /**
     * The ID of the comment to which this comment is a reply.
     */
    #[Optional]
    public ?int $answerTo;

    /**
     * The ID of the Giphy to include in the comment.
     */
    #[Optional]
    public ?string $giphyID;

    /**
     * `new CommentCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommentCreateParams::with(account: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommentCreateParams)->withAccount(...)->withText(...)
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
     */
    public static function with(
        string $account,
        string $text,
        ?int $answerTo = null,
        ?string $giphyID = null
    ): self {
        $self = new self;

        $self['account'] = $account;
        $self['text'] = $text;

        null !== $answerTo && $self['answerTo'] = $answerTo;
        null !== $giphyID && $self['giphyID'] = $giphyID;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The text of the comment.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The ID of the comment to which this comment is a reply.
     */
    public function withAnswerTo(int $answerTo): self
    {
        $self = clone $this;
        $self['answerTo'] = $answerTo;

        return $self;
    }

    /**
     * The ID of the Giphy to include in the comment.
     */
    public function withGiphyID(string $giphyID): self
    {
        $self = clone $this;
        $self['giphyID'] = $giphyID;

        return $self;
    }
}
