<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Comments\CommentNewResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author\AvatarThumbs;
use OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author\HeaderSize;
use OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author\HeaderThumbs;

/**
 * @phpstan-import-type AvatarThumbsShape from \OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author\AvatarThumbs
 * @phpstan-import-type HeaderSizeShape from \OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author\HeaderSize
 * @phpstan-import-type HeaderThumbsShape from \OnlyFansAPI\Posts\Comments\CommentNewResponse\Data\Author\HeaderThumbs
 *
 * @phpstan-type AuthorShape = array{
 *   id?: int|null,
 *   avatar?: string|null,
 *   avatarThumbs?: null|AvatarThumbs|AvatarThumbsShape,
 *   canAddSubscriber?: bool|null,
 *   canCommentStory?: bool|null,
 *   canCreateLists?: bool|null,
 *   canEarn?: bool|null,
 *   canLookStory?: bool|null,
 *   canPayInternal?: bool|null,
 *   canReport?: bool|null,
 *   canSendChatToAll?: bool|null,
 *   creditsMax?: int|null,
 *   creditsMin?: int|null,
 *   creditsMinAlternatives?: int|null,
 *   hasNotViewedStory?: bool|null,
 *   hasScheduledStream?: bool|null,
 *   hasStories?: bool|null,
 *   hasStream?: bool|null,
 *   hasStripe?: bool|null,
 *   header?: string|null,
 *   headerSize?: null|HeaderSize|HeaderSizeShape,
 *   headerThumbs?: null|HeaderThumbs|HeaderThumbsShape,
 *   isPaywallPassed?: bool|null,
 *   isStripeExist?: bool|null,
 *   isVerified?: bool|null,
 *   lastSeen?: string|null,
 *   name?: string|null,
 *   showMediaCount?: bool|null,
 *   subscribedOn?: string|null,
 *   subscribePrice?: float|null,
 *   subscriptionBundles?: list<mixed>|null,
 *   tipsEnabled?: bool|null,
 *   tipsMax?: int|null,
 *   tipsMin?: int|null,
 *   tipsMinInternal?: int|null,
 *   tipsTextEnabled?: bool|null,
 *   username?: string|null,
 *   view?: string|null,
 * }
 */
final class Author implements BaseModel
{
    /** @use SdkModel<AuthorShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?AvatarThumbs $avatarThumbs;

    #[Optional]
    public ?bool $canAddSubscriber;

    #[Optional]
    public ?bool $canCommentStory;

    #[Optional]
    public ?bool $canCreateLists;

    #[Optional]
    public ?bool $canEarn;

    #[Optional]
    public ?bool $canLookStory;

    #[Optional]
    public ?bool $canPayInternal;

    #[Optional]
    public ?bool $canReport;

    #[Optional]
    public ?bool $canSendChatToAll;

    #[Optional]
    public ?int $creditsMax;

    #[Optional]
    public ?int $creditsMin;

    #[Optional]
    public ?int $creditsMinAlternatives;

    #[Optional]
    public ?bool $hasNotViewedStory;

    #[Optional]
    public ?bool $hasScheduledStream;

    #[Optional]
    public ?bool $hasStories;

    #[Optional]
    public ?bool $hasStream;

    #[Optional]
    public ?bool $hasStripe;

    #[Optional]
    public ?string $header;

    #[Optional]
    public ?HeaderSize $headerSize;

    #[Optional]
    public ?HeaderThumbs $headerThumbs;

    #[Optional]
    public ?bool $isPaywallPassed;

    #[Optional]
    public ?bool $isStripeExist;

    #[Optional]
    public ?bool $isVerified;

    #[Optional]
    public ?string $lastSeen;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?bool $showMediaCount;

    #[Optional(nullable: true)]
    public ?string $subscribedOn;

    #[Optional]
    public ?float $subscribePrice;

    /** @var list<mixed>|null $subscriptionBundles */
    #[Optional(list: 'mixed')]
    public ?array $subscriptionBundles;

    #[Optional]
    public ?bool $tipsEnabled;

    #[Optional]
    public ?int $tipsMax;

    #[Optional]
    public ?int $tipsMin;

    #[Optional]
    public ?int $tipsMinInternal;

    #[Optional]
    public ?bool $tipsTextEnabled;

    #[Optional]
    public ?string $username;

    #[Optional]
    public ?string $view;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AvatarThumbs|AvatarThumbsShape|null $avatarThumbs
     * @param HeaderSize|HeaderSizeShape|null $headerSize
     * @param HeaderThumbs|HeaderThumbsShape|null $headerThumbs
     * @param list<mixed>|null $subscriptionBundles
     */
    public static function with(
        ?int $id = null,
        ?string $avatar = null,
        AvatarThumbs|array|null $avatarThumbs = null,
        ?bool $canAddSubscriber = null,
        ?bool $canCommentStory = null,
        ?bool $canCreateLists = null,
        ?bool $canEarn = null,
        ?bool $canLookStory = null,
        ?bool $canPayInternal = null,
        ?bool $canReport = null,
        ?bool $canSendChatToAll = null,
        ?int $creditsMax = null,
        ?int $creditsMin = null,
        ?int $creditsMinAlternatives = null,
        ?bool $hasNotViewedStory = null,
        ?bool $hasScheduledStream = null,
        ?bool $hasStories = null,
        ?bool $hasStream = null,
        ?bool $hasStripe = null,
        ?string $header = null,
        HeaderSize|array|null $headerSize = null,
        HeaderThumbs|array|null $headerThumbs = null,
        ?bool $isPaywallPassed = null,
        ?bool $isStripeExist = null,
        ?bool $isVerified = null,
        ?string $lastSeen = null,
        ?string $name = null,
        ?bool $showMediaCount = null,
        ?string $subscribedOn = null,
        ?float $subscribePrice = null,
        ?array $subscriptionBundles = null,
        ?bool $tipsEnabled = null,
        ?int $tipsMax = null,
        ?int $tipsMin = null,
        ?int $tipsMinInternal = null,
        ?bool $tipsTextEnabled = null,
        ?string $username = null,
        ?string $view = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $avatarThumbs && $self['avatarThumbs'] = $avatarThumbs;
        null !== $canAddSubscriber && $self['canAddSubscriber'] = $canAddSubscriber;
        null !== $canCommentStory && $self['canCommentStory'] = $canCommentStory;
        null !== $canCreateLists && $self['canCreateLists'] = $canCreateLists;
        null !== $canEarn && $self['canEarn'] = $canEarn;
        null !== $canLookStory && $self['canLookStory'] = $canLookStory;
        null !== $canPayInternal && $self['canPayInternal'] = $canPayInternal;
        null !== $canReport && $self['canReport'] = $canReport;
        null !== $canSendChatToAll && $self['canSendChatToAll'] = $canSendChatToAll;
        null !== $creditsMax && $self['creditsMax'] = $creditsMax;
        null !== $creditsMin && $self['creditsMin'] = $creditsMin;
        null !== $creditsMinAlternatives && $self['creditsMinAlternatives'] = $creditsMinAlternatives;
        null !== $hasNotViewedStory && $self['hasNotViewedStory'] = $hasNotViewedStory;
        null !== $hasScheduledStream && $self['hasScheduledStream'] = $hasScheduledStream;
        null !== $hasStories && $self['hasStories'] = $hasStories;
        null !== $hasStream && $self['hasStream'] = $hasStream;
        null !== $hasStripe && $self['hasStripe'] = $hasStripe;
        null !== $header && $self['header'] = $header;
        null !== $headerSize && $self['headerSize'] = $headerSize;
        null !== $headerThumbs && $self['headerThumbs'] = $headerThumbs;
        null !== $isPaywallPassed && $self['isPaywallPassed'] = $isPaywallPassed;
        null !== $isStripeExist && $self['isStripeExist'] = $isStripeExist;
        null !== $isVerified && $self['isVerified'] = $isVerified;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $name && $self['name'] = $name;
        null !== $showMediaCount && $self['showMediaCount'] = $showMediaCount;
        null !== $subscribedOn && $self['subscribedOn'] = $subscribedOn;
        null !== $subscribePrice && $self['subscribePrice'] = $subscribePrice;
        null !== $subscriptionBundles && $self['subscriptionBundles'] = $subscriptionBundles;
        null !== $tipsEnabled && $self['tipsEnabled'] = $tipsEnabled;
        null !== $tipsMax && $self['tipsMax'] = $tipsMax;
        null !== $tipsMin && $self['tipsMin'] = $tipsMin;
        null !== $tipsMinInternal && $self['tipsMinInternal'] = $tipsMinInternal;
        null !== $tipsTextEnabled && $self['tipsTextEnabled'] = $tipsTextEnabled;
        null !== $username && $self['username'] = $username;
        null !== $view && $self['view'] = $view;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    /**
     * @param AvatarThumbs|AvatarThumbsShape $avatarThumbs
     */
    public function withAvatarThumbs(AvatarThumbs|array $avatarThumbs): self
    {
        $self = clone $this;
        $self['avatarThumbs'] = $avatarThumbs;

        return $self;
    }

    public function withCanAddSubscriber(bool $canAddSubscriber): self
    {
        $self = clone $this;
        $self['canAddSubscriber'] = $canAddSubscriber;

        return $self;
    }

    public function withCanCommentStory(bool $canCommentStory): self
    {
        $self = clone $this;
        $self['canCommentStory'] = $canCommentStory;

        return $self;
    }

    public function withCanCreateLists(bool $canCreateLists): self
    {
        $self = clone $this;
        $self['canCreateLists'] = $canCreateLists;

        return $self;
    }

    public function withCanEarn(bool $canEarn): self
    {
        $self = clone $this;
        $self['canEarn'] = $canEarn;

        return $self;
    }

    public function withCanLookStory(bool $canLookStory): self
    {
        $self = clone $this;
        $self['canLookStory'] = $canLookStory;

        return $self;
    }

    public function withCanPayInternal(bool $canPayInternal): self
    {
        $self = clone $this;
        $self['canPayInternal'] = $canPayInternal;

        return $self;
    }

    public function withCanReport(bool $canReport): self
    {
        $self = clone $this;
        $self['canReport'] = $canReport;

        return $self;
    }

    public function withCanSendChatToAll(bool $canSendChatToAll): self
    {
        $self = clone $this;
        $self['canSendChatToAll'] = $canSendChatToAll;

        return $self;
    }

    public function withCreditsMax(int $creditsMax): self
    {
        $self = clone $this;
        $self['creditsMax'] = $creditsMax;

        return $self;
    }

    public function withCreditsMin(int $creditsMin): self
    {
        $self = clone $this;
        $self['creditsMin'] = $creditsMin;

        return $self;
    }

    public function withCreditsMinAlternatives(
        int $creditsMinAlternatives
    ): self {
        $self = clone $this;
        $self['creditsMinAlternatives'] = $creditsMinAlternatives;

        return $self;
    }

    public function withHasNotViewedStory(bool $hasNotViewedStory): self
    {
        $self = clone $this;
        $self['hasNotViewedStory'] = $hasNotViewedStory;

        return $self;
    }

    public function withHasScheduledStream(bool $hasScheduledStream): self
    {
        $self = clone $this;
        $self['hasScheduledStream'] = $hasScheduledStream;

        return $self;
    }

    public function withHasStories(bool $hasStories): self
    {
        $self = clone $this;
        $self['hasStories'] = $hasStories;

        return $self;
    }

    public function withHasStream(bool $hasStream): self
    {
        $self = clone $this;
        $self['hasStream'] = $hasStream;

        return $self;
    }

    public function withHasStripe(bool $hasStripe): self
    {
        $self = clone $this;
        $self['hasStripe'] = $hasStripe;

        return $self;
    }

    public function withHeader(string $header): self
    {
        $self = clone $this;
        $self['header'] = $header;

        return $self;
    }

    /**
     * @param HeaderSize|HeaderSizeShape $headerSize
     */
    public function withHeaderSize(HeaderSize|array $headerSize): self
    {
        $self = clone $this;
        $self['headerSize'] = $headerSize;

        return $self;
    }

    /**
     * @param HeaderThumbs|HeaderThumbsShape $headerThumbs
     */
    public function withHeaderThumbs(HeaderThumbs|array $headerThumbs): self
    {
        $self = clone $this;
        $self['headerThumbs'] = $headerThumbs;

        return $self;
    }

    public function withIsPaywallPassed(bool $isPaywallPassed): self
    {
        $self = clone $this;
        $self['isPaywallPassed'] = $isPaywallPassed;

        return $self;
    }

    public function withIsStripeExist(bool $isStripeExist): self
    {
        $self = clone $this;
        $self['isStripeExist'] = $isStripeExist;

        return $self;
    }

    public function withIsVerified(bool $isVerified): self
    {
        $self = clone $this;
        $self['isVerified'] = $isVerified;

        return $self;
    }

    public function withLastSeen(string $lastSeen): self
    {
        $self = clone $this;
        $self['lastSeen'] = $lastSeen;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withShowMediaCount(bool $showMediaCount): self
    {
        $self = clone $this;
        $self['showMediaCount'] = $showMediaCount;

        return $self;
    }

    public function withSubscribedOn(?string $subscribedOn): self
    {
        $self = clone $this;
        $self['subscribedOn'] = $subscribedOn;

        return $self;
    }

    public function withSubscribePrice(float $subscribePrice): self
    {
        $self = clone $this;
        $self['subscribePrice'] = $subscribePrice;

        return $self;
    }

    /**
     * @param list<mixed> $subscriptionBundles
     */
    public function withSubscriptionBundles(array $subscriptionBundles): self
    {
        $self = clone $this;
        $self['subscriptionBundles'] = $subscriptionBundles;

        return $self;
    }

    public function withTipsEnabled(bool $tipsEnabled): self
    {
        $self = clone $this;
        $self['tipsEnabled'] = $tipsEnabled;

        return $self;
    }

    public function withTipsMax(int $tipsMax): self
    {
        $self = clone $this;
        $self['tipsMax'] = $tipsMax;

        return $self;
    }

    public function withTipsMin(int $tipsMin): self
    {
        $self = clone $this;
        $self['tipsMin'] = $tipsMin;

        return $self;
    }

    public function withTipsMinInternal(int $tipsMinInternal): self
    {
        $self = clone $this;
        $self['tipsMinInternal'] = $tipsMinInternal;

        return $self;
    }

    public function withTipsTextEnabled(bool $tipsTextEnabled): self
    {
        $self = clone $this;
        $self['tipsTextEnabled'] = $tipsTextEnabled;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }

    public function withView(string $view): self
    {
        $self = clone $this;
        $self['view'] = $view;

        return $self;
    }
}
