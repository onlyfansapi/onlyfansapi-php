<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\PostCreateParams\BlockBannedWords;
use OnlyFansAPI\Posts\PostCreateParams\VotingType;

/**
 * Compose and send a new post to your OnlyFans account.
 *
 * @see OnlyFansAPI\Services\PostsService::create()
 *
 * @phpstan-type PostCreateParamsShape = array{
 *   text: string,
 *   blockBannedWords?: null|BlockBannedWords|value-of<BlockBannedWords>,
 *   expireDays?: int|null,
 *   fundRaisingTargetAmount?: int|null,
 *   fundRaisingTipsPresets?: list<string>|null,
 *   labelIDs?: string|null,
 *   mediaFiles?: list<mixed>|null,
 *   previews?: list<mixed>|null,
 *   rfTag?: string|null,
 *   saveForLater?: bool|null,
 *   scheduledDate?: string|null,
 *   votingCorrectIndex?: int|null,
 *   votingDue?: int|null,
 *   votingOptions?: list<string>|null,
 *   votingType?: null|VotingType|value-of<VotingType>,
 * }
 */
final class PostCreateParams implements BaseModel
{
    /** @use SdkModel<PostCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The post text content.
     */
    #[Required]
    public string $text;

    /**
     * Screen `text` for OnlyFans banned words and block the post if any are found (returns a 422 listing the offending words). `strict_ban` blocks all tiers, `risky` blocks Risky + Replace/soften, `replace_soften` blocks Replace/soften only. Omit to disable screening.
     *
     * @var value-of<BlockBannedWords>|null $blockBannedWords
     */
    #[Optional(enum: BlockBannedWords::class)]
    public ?string $blockBannedWords;

    /**
     * Number of days after which the post will expire. Between 1 and 30 days. Keep empty for no expiration.
     */
    #[Optional]
    public ?int $expireDays;

    /**
     * Add a fundraising target to your post. If present, value must be at least 10.
     */
    #[Optional]
    public ?int $fundRaisingTargetAmount;

    /**
     * Specify which tip amounts will be listed under the fundraising card. Required with `fundRaisingTargetAmount`, and you must provide at least 1 option. Array items cannot be higher than the `fundRaisingTargetAmount`.
     *
     * @var list<string>|null $fundRaisingTipsPresets
     */
    #[Optional(list: 'string')]
    public ?array $fundRaisingTipsPresets;

    /**
     * Array of OF label IDs. Refer to our `/posts/labels` endpoint.
     */
    #[Optional('labelIds')]
    public ?string $labelIDs;

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs.
     *
     * @var list<mixed>|null $mediaFiles
     */
    #[Optional(list: 'mixed')]
    public ?array $mediaFiles;

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     *
     * @var list<mixed>|null $previews
     */
    #[Optional(list: 'mixed')]
    public ?array $previews;

    /**
     * Array OnlyFans creator user IDs to tag in your post.
     */
    #[Optional]
    public ?string $rfTag;

    /**
     * Add your post to the "Saved for later" queue.
     */
    #[Optional]
    public ?bool $saveForLater;

    /**
     * Schedule your post in the future (UTC timezone).
     */
    #[Optional]
    public ?string $scheduledDate;

    /**
     * The array key of your quiz' correct answer. Required when `votingType` is "quiz". Keep in mind that arrays start at `0`.
     */
    #[Optional]
    public ?int $votingCorrectIndex;

    /**
     * The due date (in days) of your poll/quiz. Can be 1, 3, 7 or 30 days. Can only be filled with `votingType`.
     */
    #[Optional]
    public ?int $votingDue;

    /**
     * The options of your poll/quiz. Required with `votingType`.
     *
     * @var list<string>|null $votingOptions
     */
    #[Optional(list: 'string')]
    public ?array $votingOptions;

    /**
     * Include a poll or quiz within your post.
     *
     * @var value-of<VotingType>|null $votingType
     */
    #[Optional(enum: VotingType::class)]
    public ?string $votingType;

    /**
     * `new PostCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostCreateParams::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostCreateParams)->withText(...)
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
     * @param BlockBannedWords|value-of<BlockBannedWords>|null $blockBannedWords
     * @param list<string>|null $fundRaisingTipsPresets
     * @param list<mixed>|null $mediaFiles
     * @param list<mixed>|null $previews
     * @param list<string>|null $votingOptions
     * @param VotingType|value-of<VotingType>|null $votingType
     */
    public static function with(
        string $text,
        BlockBannedWords|string|null $blockBannedWords = null,
        ?int $expireDays = null,
        ?int $fundRaisingTargetAmount = null,
        ?array $fundRaisingTipsPresets = null,
        ?string $labelIDs = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?string $rfTag = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?int $votingCorrectIndex = null,
        ?int $votingDue = null,
        ?array $votingOptions = null,
        VotingType|string|null $votingType = null,
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $blockBannedWords && $self['blockBannedWords'] = $blockBannedWords;
        null !== $expireDays && $self['expireDays'] = $expireDays;
        null !== $fundRaisingTargetAmount && $self['fundRaisingTargetAmount'] = $fundRaisingTargetAmount;
        null !== $fundRaisingTipsPresets && $self['fundRaisingTipsPresets'] = $fundRaisingTipsPresets;
        null !== $labelIDs && $self['labelIDs'] = $labelIDs;
        null !== $mediaFiles && $self['mediaFiles'] = $mediaFiles;
        null !== $previews && $self['previews'] = $previews;
        null !== $rfTag && $self['rfTag'] = $rfTag;
        null !== $saveForLater && $self['saveForLater'] = $saveForLater;
        null !== $scheduledDate && $self['scheduledDate'] = $scheduledDate;
        null !== $votingCorrectIndex && $self['votingCorrectIndex'] = $votingCorrectIndex;
        null !== $votingDue && $self['votingDue'] = $votingDue;
        null !== $votingOptions && $self['votingOptions'] = $votingOptions;
        null !== $votingType && $self['votingType'] = $votingType;

        return $self;
    }

    /**
     * The post text content.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Screen `text` for OnlyFans banned words and block the post if any are found (returns a 422 listing the offending words). `strict_ban` blocks all tiers, `risky` blocks Risky + Replace/soften, `replace_soften` blocks Replace/soften only. Omit to disable screening.
     *
     * @param BlockBannedWords|value-of<BlockBannedWords> $blockBannedWords
     */
    public function withBlockBannedWords(
        BlockBannedWords|string $blockBannedWords
    ): self {
        $self = clone $this;
        $self['blockBannedWords'] = $blockBannedWords;

        return $self;
    }

    /**
     * Number of days after which the post will expire. Between 1 and 30 days. Keep empty for no expiration.
     */
    public function withExpireDays(int $expireDays): self
    {
        $self = clone $this;
        $self['expireDays'] = $expireDays;

        return $self;
    }

    /**
     * Add a fundraising target to your post. If present, value must be at least 10.
     */
    public function withFundRaisingTargetAmount(
        int $fundRaisingTargetAmount
    ): self {
        $self = clone $this;
        $self['fundRaisingTargetAmount'] = $fundRaisingTargetAmount;

        return $self;
    }

    /**
     * Specify which tip amounts will be listed under the fundraising card. Required with `fundRaisingTargetAmount`, and you must provide at least 1 option. Array items cannot be higher than the `fundRaisingTargetAmount`.
     *
     * @param list<string> $fundRaisingTipsPresets
     */
    public function withFundRaisingTipsPresets(
        array $fundRaisingTipsPresets
    ): self {
        $self = clone $this;
        $self['fundRaisingTipsPresets'] = $fundRaisingTipsPresets;

        return $self;
    }

    /**
     * Array of OF label IDs. Refer to our `/posts/labels` endpoint.
     */
    public function withLabelIDs(string $labelIDs): self
    {
        $self = clone $this;
        $self['labelIDs'] = $labelIDs;

        return $self;
    }

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs.
     *
     * @param list<mixed> $mediaFiles
     */
    public function withMediaFiles(array $mediaFiles): self
    {
        $self = clone $this;
        $self['mediaFiles'] = $mediaFiles;

        return $self;
    }

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     *
     * @param list<mixed> $previews
     */
    public function withPreviews(array $previews): self
    {
        $self = clone $this;
        $self['previews'] = $previews;

        return $self;
    }

    /**
     * Array OnlyFans creator user IDs to tag in your post.
     */
    public function withRfTag(string $rfTag): self
    {
        $self = clone $this;
        $self['rfTag'] = $rfTag;

        return $self;
    }

    /**
     * Add your post to the "Saved for later" queue.
     */
    public function withSaveForLater(bool $saveForLater): self
    {
        $self = clone $this;
        $self['saveForLater'] = $saveForLater;

        return $self;
    }

    /**
     * Schedule your post in the future (UTC timezone).
     */
    public function withScheduledDate(string $scheduledDate): self
    {
        $self = clone $this;
        $self['scheduledDate'] = $scheduledDate;

        return $self;
    }

    /**
     * The array key of your quiz' correct answer. Required when `votingType` is "quiz". Keep in mind that arrays start at `0`.
     */
    public function withVotingCorrectIndex(int $votingCorrectIndex): self
    {
        $self = clone $this;
        $self['votingCorrectIndex'] = $votingCorrectIndex;

        return $self;
    }

    /**
     * The due date (in days) of your poll/quiz. Can be 1, 3, 7 or 30 days. Can only be filled with `votingType`.
     */
    public function withVotingDue(int $votingDue): self
    {
        $self = clone $this;
        $self['votingDue'] = $votingDue;

        return $self;
    }

    /**
     * The options of your poll/quiz. Required with `votingType`.
     *
     * @param list<string> $votingOptions
     */
    public function withVotingOptions(array $votingOptions): self
    {
        $self = clone $this;
        $self['votingOptions'] = $votingOptions;

        return $self;
    }

    /**
     * Include a poll or quiz within your post.
     *
     * @param VotingType|value-of<VotingType> $votingType
     */
    public function withVotingType(VotingType|string $votingType): self
    {
        $self = clone $this;
        $self['votingType'] = $votingType;

        return $self;
    }
}
