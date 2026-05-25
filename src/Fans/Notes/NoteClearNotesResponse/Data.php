<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\Notes\NoteClearNotesResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\AvatarThumbs;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\HeaderSize;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\HeaderThumbs;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\ListsState;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\SubscribedByData;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\SubscribedOnData;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\SubscriptionBundle;

/**
 * @phpstan-import-type AvatarThumbsShape from \OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\AvatarThumbs
 * @phpstan-import-type HeaderSizeShape from \OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\HeaderSize
 * @phpstan-import-type HeaderThumbsShape from \OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\HeaderThumbs
 * @phpstan-import-type ListsStateShape from \OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\ListsState
 * @phpstan-import-type SubscribedByDataShape from \OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\SubscribedByData
 * @phpstan-import-type SubscribedOnDataShape from \OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\SubscribedOnData
 * @phpstan-import-type SubscriptionBundleShape from \OnlyFansAPI\Fans\Notes\NoteClearNotesResponse\Data\SubscriptionBundle
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   avatar?: string|null,
 *   avatarThumbs?: null|AvatarThumbs|AvatarThumbsShape,
 *   canAddSubscriber?: bool|null,
 *   canCommentStory?: bool|null,
 *   canEarn?: bool|null,
 *   canLookStory?: bool|null,
 *   canPayInternal?: bool|null,
 *   canReceiveChatMessage?: bool|null,
 *   canReport?: bool|null,
 *   canRestrict?: bool|null,
 *   canTrialSend?: bool|null,
 *   canUnsubscribe?: bool|null,
 *   currentSubscribePrice?: int|null,
 *   displayName?: string|null,
 *   hasNotViewedStory?: bool|null,
 *   hasScheduledStream?: bool|null,
 *   hasStories?: bool|null,
 *   hasStream?: bool|null,
 *   header?: string|null,
 *   headerSize?: null|HeaderSize|HeaderSizeShape,
 *   headerThumbs?: null|HeaderThumbs|HeaderThumbsShape,
 *   hideChat?: bool|null,
 *   isBlocked?: bool|null,
 *   isPaywallRequired?: bool|null,
 *   isPendingAutoprolong?: bool|null,
 *   isPerformer?: bool|null,
 *   isRealPerformer?: bool|null,
 *   isRestricted?: bool|null,
 *   isVerified?: bool|null,
 *   lastSeen?: string|null,
 *   listsStates?: list<ListsState|ListsStateShape>|null,
 *   name?: string|null,
 *   notice?: string|null,
 *   subscribedBy?: bool|null,
 *   subscribedByAutoprolong?: bool|null,
 *   subscribedByData?: null|SubscribedByData|SubscribedByDataShape,
 *   subscribedByExpire?: bool|null,
 *   subscribedByExpireDate?: string|null,
 *   subscribedIsExpiredNow?: bool|null,
 *   subscribedOn?: string|null,
 *   subscribedOnData?: null|SubscribedOnData|SubscribedOnDataShape,
 *   subscribedOnDuration?: string|null,
 *   subscribedOnExpiredNow?: bool|null,
 *   subscribePrice?: float|null,
 *   subscriptionBundles?: list<SubscriptionBundle|SubscriptionBundleShape>|null,
 *   tipsEnabled?: bool|null,
 *   tipsMax?: int|null,
 *   tipsMin?: int|null,
 *   tipsMinInternal?: int|null,
 *   tipsTextEnabled?: bool|null,
 *   username?: string|null,
 *   view?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
    public ?bool $canEarn;

    #[Optional]
    public ?bool $canLookStory;

    #[Optional]
    public ?bool $canPayInternal;

    #[Optional]
    public ?bool $canReceiveChatMessage;

    #[Optional]
    public ?bool $canReport;

    #[Optional]
    public ?bool $canRestrict;

    #[Optional]
    public ?bool $canTrialSend;

    #[Optional]
    public ?bool $canUnsubscribe;

    #[Optional]
    public ?int $currentSubscribePrice;

    #[Optional]
    public ?string $displayName;

    #[Optional]
    public ?bool $hasNotViewedStory;

    #[Optional]
    public ?bool $hasScheduledStream;

    #[Optional]
    public ?bool $hasStories;

    #[Optional]
    public ?bool $hasStream;

    #[Optional]
    public ?string $header;

    #[Optional]
    public ?HeaderSize $headerSize;

    #[Optional]
    public ?HeaderThumbs $headerThumbs;

    #[Optional]
    public ?bool $hideChat;

    #[Optional]
    public ?bool $isBlocked;

    #[Optional]
    public ?bool $isPaywallRequired;

    #[Optional]
    public ?bool $isPendingAutoprolong;

    #[Optional]
    public ?bool $isPerformer;

    #[Optional]
    public ?bool $isRealPerformer;

    #[Optional]
    public ?bool $isRestricted;

    #[Optional]
    public ?bool $isVerified;

    #[Optional]
    public ?string $lastSeen;

    /** @var list<ListsState>|null $listsStates */
    #[Optional(list: ListsState::class)]
    public ?array $listsStates;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $notice;

    #[Optional]
    public ?bool $subscribedBy;

    #[Optional]
    public ?bool $subscribedByAutoprolong;

    #[Optional]
    public ?SubscribedByData $subscribedByData;

    #[Optional]
    public ?bool $subscribedByExpire;

    #[Optional]
    public ?string $subscribedByExpireDate;

    #[Optional]
    public ?bool $subscribedIsExpiredNow;

    #[Optional(nullable: true)]
    public ?string $subscribedOn;

    #[Optional]
    public ?SubscribedOnData $subscribedOnData;

    #[Optional]
    public ?string $subscribedOnDuration;

    #[Optional]
    public ?bool $subscribedOnExpiredNow;

    #[Optional]
    public ?float $subscribePrice;

    /** @var list<SubscriptionBundle>|null $subscriptionBundles */
    #[Optional(list: SubscriptionBundle::class)]
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
     * @param list<ListsState|ListsStateShape>|null $listsStates
     * @param SubscribedByData|SubscribedByDataShape|null $subscribedByData
     * @param SubscribedOnData|SubscribedOnDataShape|null $subscribedOnData
     * @param list<SubscriptionBundle|SubscriptionBundleShape>|null $subscriptionBundles
     */
    public static function with(
        ?int $id = null,
        ?string $avatar = null,
        AvatarThumbs|array|null $avatarThumbs = null,
        ?bool $canAddSubscriber = null,
        ?bool $canCommentStory = null,
        ?bool $canEarn = null,
        ?bool $canLookStory = null,
        ?bool $canPayInternal = null,
        ?bool $canReceiveChatMessage = null,
        ?bool $canReport = null,
        ?bool $canRestrict = null,
        ?bool $canTrialSend = null,
        ?bool $canUnsubscribe = null,
        ?int $currentSubscribePrice = null,
        ?string $displayName = null,
        ?bool $hasNotViewedStory = null,
        ?bool $hasScheduledStream = null,
        ?bool $hasStories = null,
        ?bool $hasStream = null,
        ?string $header = null,
        HeaderSize|array|null $headerSize = null,
        HeaderThumbs|array|null $headerThumbs = null,
        ?bool $hideChat = null,
        ?bool $isBlocked = null,
        ?bool $isPaywallRequired = null,
        ?bool $isPendingAutoprolong = null,
        ?bool $isPerformer = null,
        ?bool $isRealPerformer = null,
        ?bool $isRestricted = null,
        ?bool $isVerified = null,
        ?string $lastSeen = null,
        ?array $listsStates = null,
        ?string $name = null,
        ?string $notice = null,
        ?bool $subscribedBy = null,
        ?bool $subscribedByAutoprolong = null,
        SubscribedByData|array|null $subscribedByData = null,
        ?bool $subscribedByExpire = null,
        ?string $subscribedByExpireDate = null,
        ?bool $subscribedIsExpiredNow = null,
        ?string $subscribedOn = null,
        SubscribedOnData|array|null $subscribedOnData = null,
        ?string $subscribedOnDuration = null,
        ?bool $subscribedOnExpiredNow = null,
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
        null !== $canEarn && $self['canEarn'] = $canEarn;
        null !== $canLookStory && $self['canLookStory'] = $canLookStory;
        null !== $canPayInternal && $self['canPayInternal'] = $canPayInternal;
        null !== $canReceiveChatMessage && $self['canReceiveChatMessage'] = $canReceiveChatMessage;
        null !== $canReport && $self['canReport'] = $canReport;
        null !== $canRestrict && $self['canRestrict'] = $canRestrict;
        null !== $canTrialSend && $self['canTrialSend'] = $canTrialSend;
        null !== $canUnsubscribe && $self['canUnsubscribe'] = $canUnsubscribe;
        null !== $currentSubscribePrice && $self['currentSubscribePrice'] = $currentSubscribePrice;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $hasNotViewedStory && $self['hasNotViewedStory'] = $hasNotViewedStory;
        null !== $hasScheduledStream && $self['hasScheduledStream'] = $hasScheduledStream;
        null !== $hasStories && $self['hasStories'] = $hasStories;
        null !== $hasStream && $self['hasStream'] = $hasStream;
        null !== $header && $self['header'] = $header;
        null !== $headerSize && $self['headerSize'] = $headerSize;
        null !== $headerThumbs && $self['headerThumbs'] = $headerThumbs;
        null !== $hideChat && $self['hideChat'] = $hideChat;
        null !== $isBlocked && $self['isBlocked'] = $isBlocked;
        null !== $isPaywallRequired && $self['isPaywallRequired'] = $isPaywallRequired;
        null !== $isPendingAutoprolong && $self['isPendingAutoprolong'] = $isPendingAutoprolong;
        null !== $isPerformer && $self['isPerformer'] = $isPerformer;
        null !== $isRealPerformer && $self['isRealPerformer'] = $isRealPerformer;
        null !== $isRestricted && $self['isRestricted'] = $isRestricted;
        null !== $isVerified && $self['isVerified'] = $isVerified;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $listsStates && $self['listsStates'] = $listsStates;
        null !== $name && $self['name'] = $name;
        null !== $notice && $self['notice'] = $notice;
        null !== $subscribedBy && $self['subscribedBy'] = $subscribedBy;
        null !== $subscribedByAutoprolong && $self['subscribedByAutoprolong'] = $subscribedByAutoprolong;
        null !== $subscribedByData && $self['subscribedByData'] = $subscribedByData;
        null !== $subscribedByExpire && $self['subscribedByExpire'] = $subscribedByExpire;
        null !== $subscribedByExpireDate && $self['subscribedByExpireDate'] = $subscribedByExpireDate;
        null !== $subscribedIsExpiredNow && $self['subscribedIsExpiredNow'] = $subscribedIsExpiredNow;
        null !== $subscribedOn && $self['subscribedOn'] = $subscribedOn;
        null !== $subscribedOnData && $self['subscribedOnData'] = $subscribedOnData;
        null !== $subscribedOnDuration && $self['subscribedOnDuration'] = $subscribedOnDuration;
        null !== $subscribedOnExpiredNow && $self['subscribedOnExpiredNow'] = $subscribedOnExpiredNow;
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

    public function withCanReceiveChatMessage(bool $canReceiveChatMessage): self
    {
        $self = clone $this;
        $self['canReceiveChatMessage'] = $canReceiveChatMessage;

        return $self;
    }

    public function withCanReport(bool $canReport): self
    {
        $self = clone $this;
        $self['canReport'] = $canReport;

        return $self;
    }

    public function withCanRestrict(bool $canRestrict): self
    {
        $self = clone $this;
        $self['canRestrict'] = $canRestrict;

        return $self;
    }

    public function withCanTrialSend(bool $canTrialSend): self
    {
        $self = clone $this;
        $self['canTrialSend'] = $canTrialSend;

        return $self;
    }

    public function withCanUnsubscribe(bool $canUnsubscribe): self
    {
        $self = clone $this;
        $self['canUnsubscribe'] = $canUnsubscribe;

        return $self;
    }

    public function withCurrentSubscribePrice(int $currentSubscribePrice): self
    {
        $self = clone $this;
        $self['currentSubscribePrice'] = $currentSubscribePrice;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

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

    public function withHideChat(bool $hideChat): self
    {
        $self = clone $this;
        $self['hideChat'] = $hideChat;

        return $self;
    }

    public function withIsBlocked(bool $isBlocked): self
    {
        $self = clone $this;
        $self['isBlocked'] = $isBlocked;

        return $self;
    }

    public function withIsPaywallRequired(bool $isPaywallRequired): self
    {
        $self = clone $this;
        $self['isPaywallRequired'] = $isPaywallRequired;

        return $self;
    }

    public function withIsPendingAutoprolong(bool $isPendingAutoprolong): self
    {
        $self = clone $this;
        $self['isPendingAutoprolong'] = $isPendingAutoprolong;

        return $self;
    }

    public function withIsPerformer(bool $isPerformer): self
    {
        $self = clone $this;
        $self['isPerformer'] = $isPerformer;

        return $self;
    }

    public function withIsRealPerformer(bool $isRealPerformer): self
    {
        $self = clone $this;
        $self['isRealPerformer'] = $isRealPerformer;

        return $self;
    }

    public function withIsRestricted(bool $isRestricted): self
    {
        $self = clone $this;
        $self['isRestricted'] = $isRestricted;

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

    /**
     * @param list<ListsState|ListsStateShape> $listsStates
     */
    public function withListsStates(array $listsStates): self
    {
        $self = clone $this;
        $self['listsStates'] = $listsStates;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withNotice(string $notice): self
    {
        $self = clone $this;
        $self['notice'] = $notice;

        return $self;
    }

    public function withSubscribedBy(bool $subscribedBy): self
    {
        $self = clone $this;
        $self['subscribedBy'] = $subscribedBy;

        return $self;
    }

    public function withSubscribedByAutoprolong(
        bool $subscribedByAutoprolong
    ): self {
        $self = clone $this;
        $self['subscribedByAutoprolong'] = $subscribedByAutoprolong;

        return $self;
    }

    /**
     * @param SubscribedByData|SubscribedByDataShape $subscribedByData
     */
    public function withSubscribedByData(
        SubscribedByData|array $subscribedByData
    ): self {
        $self = clone $this;
        $self['subscribedByData'] = $subscribedByData;

        return $self;
    }

    public function withSubscribedByExpire(bool $subscribedByExpire): self
    {
        $self = clone $this;
        $self['subscribedByExpire'] = $subscribedByExpire;

        return $self;
    }

    public function withSubscribedByExpireDate(
        string $subscribedByExpireDate
    ): self {
        $self = clone $this;
        $self['subscribedByExpireDate'] = $subscribedByExpireDate;

        return $self;
    }

    public function withSubscribedIsExpiredNow(
        bool $subscribedIsExpiredNow
    ): self {
        $self = clone $this;
        $self['subscribedIsExpiredNow'] = $subscribedIsExpiredNow;

        return $self;
    }

    public function withSubscribedOn(?string $subscribedOn): self
    {
        $self = clone $this;
        $self['subscribedOn'] = $subscribedOn;

        return $self;
    }

    /**
     * @param SubscribedOnData|SubscribedOnDataShape $subscribedOnData
     */
    public function withSubscribedOnData(
        SubscribedOnData|array $subscribedOnData
    ): self {
        $self = clone $this;
        $self['subscribedOnData'] = $subscribedOnData;

        return $self;
    }

    public function withSubscribedOnDuration(string $subscribedOnDuration): self
    {
        $self = clone $this;
        $self['subscribedOnDuration'] = $subscribedOnDuration;

        return $self;
    }

    public function withSubscribedOnExpiredNow(
        bool $subscribedOnExpiredNow
    ): self {
        $self = clone $this;
        $self['subscribedOnExpiredNow'] = $subscribedOnExpiredNow;

        return $self;
    }

    public function withSubscribePrice(float $subscribePrice): self
    {
        $self = clone $this;
        $self['subscribePrice'] = $subscribePrice;

        return $self;
    }

    /**
     * @param list<SubscriptionBundle|SubscriptionBundleShape> $subscriptionBundles
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
