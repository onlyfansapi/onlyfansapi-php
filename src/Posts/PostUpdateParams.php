<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\PostUpdateParams\VotingType;

/**
 * Update a posted, queued, or "saved for later" post.
 *
 * @see OnlyFansAPI\Services\PostsService::update()
 *
 * @phpstan-type PostUpdateParamsShape = array{
 *   account: string,
 *   text: string,
 *   expireDays?: int|null,
 *   fundRaisingTargetAmount?: int|null,
 *   fundRaisingTipsPresets?: list<string>|null,
 *   labelIDs?: string|null,
 *   mediaFiles?: string|null,
 *   price?: int|null,
 *   rfTag?: string|null,
 *   saveForLater?: bool|null,
 *   scheduledDate?: string|null,
 *   votingCorrectIndex?: int|null,
 *   votingDue?: int|null,
 *   votingOptions?: list<string>|null,
 *   votingType?: null|VotingType|value-of<VotingType>,
 * }
 */
final class PostUpdateParams implements BaseModel
{
    /** @use SdkModel<PostUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The post text content.
     */
    #[Required]
    public string $text;

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
     * Array of OFAPI `ofapi_media_` IDs, or OF media IDs.
     */
    #[Optional]
    public ?string $mediaFiles;

    /**
     * Price for paid content (0 or between 3-100). In case this is not zero, **mediaFiles** is required.
     */
    #[Optional]
    public ?int $price;

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
     * `new PostUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostUpdateParams::with(account: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostUpdateParams)->withAccount(...)->withText(...)
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
     * @param list<string>|null $fundRaisingTipsPresets
     * @param list<string>|null $votingOptions
     * @param VotingType|value-of<VotingType>|null $votingType
     */
    public static function with(
        string $account,
        string $text,
        ?int $expireDays = null,
        ?int $fundRaisingTargetAmount = null,
        ?array $fundRaisingTipsPresets = null,
        ?string $labelIDs = null,
        ?string $mediaFiles = null,
        ?int $price = null,
        ?string $rfTag = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?int $votingCorrectIndex = null,
        ?int $votingDue = null,
        ?array $votingOptions = null,
        VotingType|string|null $votingType = null,
    ): self {
        $self = new self;

        $self['account'] = $account;
        $self['text'] = $text;

        null !== $expireDays && $self['expireDays'] = $expireDays;
        null !== $fundRaisingTargetAmount && $self['fundRaisingTargetAmount'] = $fundRaisingTargetAmount;
        null !== $fundRaisingTipsPresets && $self['fundRaisingTipsPresets'] = $fundRaisingTipsPresets;
        null !== $labelIDs && $self['labelIDs'] = $labelIDs;
        null !== $mediaFiles && $self['mediaFiles'] = $mediaFiles;
        null !== $price && $self['price'] = $price;
        null !== $rfTag && $self['rfTag'] = $rfTag;
        null !== $saveForLater && $self['saveForLater'] = $saveForLater;
        null !== $scheduledDate && $self['scheduledDate'] = $scheduledDate;
        null !== $votingCorrectIndex && $self['votingCorrectIndex'] = $votingCorrectIndex;
        null !== $votingDue && $self['votingDue'] = $votingDue;
        null !== $votingOptions && $self['votingOptions'] = $votingOptions;
        null !== $votingType && $self['votingType'] = $votingType;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

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
     * Array of OFAPI `ofapi_media_` IDs, or OF media IDs.
     */
    public function withMediaFiles(string $mediaFiles): self
    {
        $self = clone $this;
        $self['mediaFiles'] = $mediaFiles;

        return $self;
    }

    /**
     * Price for paid content (0 or between 3-100). In case this is not zero, **mediaFiles** is required.
     */
    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

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
