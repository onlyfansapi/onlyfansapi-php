<?php

declare(strict_types=1);

namespace Onlyfansapi\Users\UserListResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Users\UserListResponse\Data\_1000000\AvatarThumbs;
use Onlyfansapi\Users\UserListResponse\Data\_1000000\ListsState;
use Onlyfansapi\Users\UserListResponse\Data\_1000000\SubscribedByData;
use Onlyfansapi\Users\UserListResponse\Data\_1000000\SubscribedOnData;

/**
 * @phpstan-import-type AvatarThumbsShape from \Onlyfansapi\Users\UserListResponse\Data\_1000000\AvatarThumbs
 * @phpstan-import-type ListsStateShape from \Onlyfansapi\Users\UserListResponse\Data\_1000000\ListsState
 * @phpstan-import-type SubscribedByDataShape from \Onlyfansapi\Users\UserListResponse\Data\_1000000\SubscribedByData
 * @phpstan-import-type SubscribedOnDataShape from \Onlyfansapi\Users\UserListResponse\Data\_1000000\SubscribedOnData
 *
 * @phpstan-type _1000000Shape = array{
 *   id?: int|null,
 *   about?: string|null,
 *   archivedPostsCount?: int|null,
 *   audiosCount?: int|null,
 *   avatar?: string|null,
 *   avatarHeaderConverterUpload?: bool|null,
 *   avatarThumbs?: null|AvatarThumbs|AvatarThumbsShape,
 *   canAddSubscriber?: bool|null,
 *   canChat?: bool|null,
 *   canCommentStory?: bool|null,
 *   canCreatePromotion?: bool|null,
 *   canCreateTrial?: bool|null,
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
 *   favoritedCount?: int|null,
 *   favoritesCount?: int|null,
 *   firstPublishedPostDate?: string|null,
 *   hasFriends?: bool|null,
 *   hasLabels?: bool|null,
 *   hasLinks?: bool|null,
 *   hasNotViewedStory?: bool|null,
 *   hasPinnedPosts?: bool|null,
 *   hasScheduledStream?: bool|null,
 *   hasStories?: bool|null,
 *   hasStream?: bool|null,
 *   header?: string|null,
 *   headerSize?: string|null,
 *   headerThumbs?: string|null,
 *   isActive?: bool|null,
 *   isAdultContent?: bool|null,
 *   isBlocked?: bool|null,
 *   isFriend?: bool|null,
 *   isMarkdownDisabledForAbout?: bool|null,
 *   isPaywallRequired?: bool|null,
 *   isPendingAutoprolong?: bool|null,
 *   isPerformer?: bool|null,
 *   isPrivateRestriction?: bool|null,
 *   isRealPerformer?: bool|null,
 *   isReferrerAllowed?: bool|null,
 *   isRestricted?: bool|null,
 *   isSpotifyConnected?: bool|null,
 *   isSpringConnected?: bool|null,
 *   isVerified?: bool|null,
 *   joinDate?: string|null,
 *   lastSeen?: string|null,
 *   listsStates?: list<ListsState|ListsStateShape>|null,
 *   location?: string|null,
 *   mediasCount?: int|null,
 *   name?: string|null,
 *   notice?: string|null,
 *   photosCount?: int|null,
 *   postsCount?: int|null,
 *   privateArchivedPostsCount?: int|null,
 *   showMediaCount?: bool|null,
 *   showPostsInFeed?: bool|null,
 *   showSubscribersCount?: bool|null,
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
 *   subscribePrice?: int|null,
 *   subscribersCount?: string|null,
 *   tipsEnabled?: bool|null,
 *   tipsMax?: int|null,
 *   tipsMin?: int|null,
 *   tipsMinInternal?: int|null,
 *   tipsTextEnabled?: bool|null,
 *   username?: string|null,
 *   videosCount?: int|null,
 *   view?: string|null,
 *   website?: string|null,
 *   wishlist?: string|null,
 * }
 */
final class _1000000 implements BaseModel
{
    /** @use SdkModel<_1000000Shape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $about;

    #[Optional]
    public ?int $archivedPostsCount;

    #[Optional]
    public ?int $audiosCount;

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?bool $avatarHeaderConverterUpload;

    #[Optional]
    public ?AvatarThumbs $avatarThumbs;

    #[Optional]
    public ?bool $canAddSubscriber;

    #[Optional]
    public ?bool $canChat;

    #[Optional]
    public ?bool $canCommentStory;

    #[Optional]
    public ?bool $canCreatePromotion;

    #[Optional]
    public ?bool $canCreateTrial;

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
    public ?int $favoritedCount;

    #[Optional]
    public ?int $favoritesCount;

    #[Optional]
    public ?string $firstPublishedPostDate;

    #[Optional]
    public ?bool $hasFriends;

    #[Optional]
    public ?bool $hasLabels;

    #[Optional]
    public ?bool $hasLinks;

    #[Optional]
    public ?bool $hasNotViewedStory;

    #[Optional]
    public ?bool $hasPinnedPosts;

    #[Optional]
    public ?bool $hasScheduledStream;

    #[Optional]
    public ?bool $hasStories;

    #[Optional]
    public ?bool $hasStream;

    #[Optional(nullable: true)]
    public ?string $header;

    #[Optional(nullable: true)]
    public ?string $headerSize;

    #[Optional(nullable: true)]
    public ?string $headerThumbs;

    #[Optional]
    public ?bool $isActive;

    #[Optional]
    public ?bool $isAdultContent;

    #[Optional]
    public ?bool $isBlocked;

    #[Optional]
    public ?bool $isFriend;

    #[Optional]
    public ?bool $isMarkdownDisabledForAbout;

    #[Optional]
    public ?bool $isPaywallRequired;

    #[Optional]
    public ?bool $isPendingAutoprolong;

    #[Optional]
    public ?bool $isPerformer;

    #[Optional]
    public ?bool $isPrivateRestriction;

    #[Optional]
    public ?bool $isRealPerformer;

    #[Optional]
    public ?bool $isReferrerAllowed;

    #[Optional]
    public ?bool $isRestricted;

    #[Optional]
    public ?bool $isSpotifyConnected;

    #[Optional]
    public ?bool $isSpringConnected;

    #[Optional]
    public ?bool $isVerified;

    #[Optional]
    public ?string $joinDate;

    #[Optional]
    public ?string $lastSeen;

    /** @var list<ListsState>|null $listsStates */
    #[Optional(list: ListsState::class)]
    public ?array $listsStates;

    #[Optional(nullable: true)]
    public ?string $location;

    #[Optional]
    public ?int $mediasCount;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $notice;

    #[Optional]
    public ?int $photosCount;

    #[Optional]
    public ?int $postsCount;

    #[Optional]
    public ?int $privateArchivedPostsCount;

    #[Optional]
    public ?bool $showMediaCount;

    #[Optional]
    public ?bool $showPostsInFeed;

    #[Optional]
    public ?bool $showSubscribersCount;

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
    public ?int $subscribePrice;

    #[Optional(nullable: true)]
    public ?string $subscribersCount;

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
    public ?int $videosCount;

    #[Optional]
    public ?string $view;

    #[Optional(nullable: true)]
    public ?string $website;

    #[Optional(nullable: true)]
    public ?string $wishlist;

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
     * @param list<ListsState|ListsStateShape>|null $listsStates
     * @param SubscribedByData|SubscribedByDataShape|null $subscribedByData
     * @param SubscribedOnData|SubscribedOnDataShape|null $subscribedOnData
     */
    public static function with(
        ?int $id = null,
        ?string $about = null,
        ?int $archivedPostsCount = null,
        ?int $audiosCount = null,
        ?string $avatar = null,
        ?bool $avatarHeaderConverterUpload = null,
        AvatarThumbs|array|null $avatarThumbs = null,
        ?bool $canAddSubscriber = null,
        ?bool $canChat = null,
        ?bool $canCommentStory = null,
        ?bool $canCreatePromotion = null,
        ?bool $canCreateTrial = null,
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
        ?int $favoritedCount = null,
        ?int $favoritesCount = null,
        ?string $firstPublishedPostDate = null,
        ?bool $hasFriends = null,
        ?bool $hasLabels = null,
        ?bool $hasLinks = null,
        ?bool $hasNotViewedStory = null,
        ?bool $hasPinnedPosts = null,
        ?bool $hasScheduledStream = null,
        ?bool $hasStories = null,
        ?bool $hasStream = null,
        ?string $header = null,
        ?string $headerSize = null,
        ?string $headerThumbs = null,
        ?bool $isActive = null,
        ?bool $isAdultContent = null,
        ?bool $isBlocked = null,
        ?bool $isFriend = null,
        ?bool $isMarkdownDisabledForAbout = null,
        ?bool $isPaywallRequired = null,
        ?bool $isPendingAutoprolong = null,
        ?bool $isPerformer = null,
        ?bool $isPrivateRestriction = null,
        ?bool $isRealPerformer = null,
        ?bool $isReferrerAllowed = null,
        ?bool $isRestricted = null,
        ?bool $isSpotifyConnected = null,
        ?bool $isSpringConnected = null,
        ?bool $isVerified = null,
        ?string $joinDate = null,
        ?string $lastSeen = null,
        ?array $listsStates = null,
        ?string $location = null,
        ?int $mediasCount = null,
        ?string $name = null,
        ?string $notice = null,
        ?int $photosCount = null,
        ?int $postsCount = null,
        ?int $privateArchivedPostsCount = null,
        ?bool $showMediaCount = null,
        ?bool $showPostsInFeed = null,
        ?bool $showSubscribersCount = null,
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
        ?int $subscribePrice = null,
        ?string $subscribersCount = null,
        ?bool $tipsEnabled = null,
        ?int $tipsMax = null,
        ?int $tipsMin = null,
        ?int $tipsMinInternal = null,
        ?bool $tipsTextEnabled = null,
        ?string $username = null,
        ?int $videosCount = null,
        ?string $view = null,
        ?string $website = null,
        ?string $wishlist = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $about && $self['about'] = $about;
        null !== $archivedPostsCount && $self['archivedPostsCount'] = $archivedPostsCount;
        null !== $audiosCount && $self['audiosCount'] = $audiosCount;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $avatarHeaderConverterUpload && $self['avatarHeaderConverterUpload'] = $avatarHeaderConverterUpload;
        null !== $avatarThumbs && $self['avatarThumbs'] = $avatarThumbs;
        null !== $canAddSubscriber && $self['canAddSubscriber'] = $canAddSubscriber;
        null !== $canChat && $self['canChat'] = $canChat;
        null !== $canCommentStory && $self['canCommentStory'] = $canCommentStory;
        null !== $canCreatePromotion && $self['canCreatePromotion'] = $canCreatePromotion;
        null !== $canCreateTrial && $self['canCreateTrial'] = $canCreateTrial;
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
        null !== $favoritedCount && $self['favoritedCount'] = $favoritedCount;
        null !== $favoritesCount && $self['favoritesCount'] = $favoritesCount;
        null !== $firstPublishedPostDate && $self['firstPublishedPostDate'] = $firstPublishedPostDate;
        null !== $hasFriends && $self['hasFriends'] = $hasFriends;
        null !== $hasLabels && $self['hasLabels'] = $hasLabels;
        null !== $hasLinks && $self['hasLinks'] = $hasLinks;
        null !== $hasNotViewedStory && $self['hasNotViewedStory'] = $hasNotViewedStory;
        null !== $hasPinnedPosts && $self['hasPinnedPosts'] = $hasPinnedPosts;
        null !== $hasScheduledStream && $self['hasScheduledStream'] = $hasScheduledStream;
        null !== $hasStories && $self['hasStories'] = $hasStories;
        null !== $hasStream && $self['hasStream'] = $hasStream;
        null !== $header && $self['header'] = $header;
        null !== $headerSize && $self['headerSize'] = $headerSize;
        null !== $headerThumbs && $self['headerThumbs'] = $headerThumbs;
        null !== $isActive && $self['isActive'] = $isActive;
        null !== $isAdultContent && $self['isAdultContent'] = $isAdultContent;
        null !== $isBlocked && $self['isBlocked'] = $isBlocked;
        null !== $isFriend && $self['isFriend'] = $isFriend;
        null !== $isMarkdownDisabledForAbout && $self['isMarkdownDisabledForAbout'] = $isMarkdownDisabledForAbout;
        null !== $isPaywallRequired && $self['isPaywallRequired'] = $isPaywallRequired;
        null !== $isPendingAutoprolong && $self['isPendingAutoprolong'] = $isPendingAutoprolong;
        null !== $isPerformer && $self['isPerformer'] = $isPerformer;
        null !== $isPrivateRestriction && $self['isPrivateRestriction'] = $isPrivateRestriction;
        null !== $isRealPerformer && $self['isRealPerformer'] = $isRealPerformer;
        null !== $isReferrerAllowed && $self['isReferrerAllowed'] = $isReferrerAllowed;
        null !== $isRestricted && $self['isRestricted'] = $isRestricted;
        null !== $isSpotifyConnected && $self['isSpotifyConnected'] = $isSpotifyConnected;
        null !== $isSpringConnected && $self['isSpringConnected'] = $isSpringConnected;
        null !== $isVerified && $self['isVerified'] = $isVerified;
        null !== $joinDate && $self['joinDate'] = $joinDate;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $listsStates && $self['listsStates'] = $listsStates;
        null !== $location && $self['location'] = $location;
        null !== $mediasCount && $self['mediasCount'] = $mediasCount;
        null !== $name && $self['name'] = $name;
        null !== $notice && $self['notice'] = $notice;
        null !== $photosCount && $self['photosCount'] = $photosCount;
        null !== $postsCount && $self['postsCount'] = $postsCount;
        null !== $privateArchivedPostsCount && $self['privateArchivedPostsCount'] = $privateArchivedPostsCount;
        null !== $showMediaCount && $self['showMediaCount'] = $showMediaCount;
        null !== $showPostsInFeed && $self['showPostsInFeed'] = $showPostsInFeed;
        null !== $showSubscribersCount && $self['showSubscribersCount'] = $showSubscribersCount;
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
        null !== $subscribersCount && $self['subscribersCount'] = $subscribersCount;
        null !== $tipsEnabled && $self['tipsEnabled'] = $tipsEnabled;
        null !== $tipsMax && $self['tipsMax'] = $tipsMax;
        null !== $tipsMin && $self['tipsMin'] = $tipsMin;
        null !== $tipsMinInternal && $self['tipsMinInternal'] = $tipsMinInternal;
        null !== $tipsTextEnabled && $self['tipsTextEnabled'] = $tipsTextEnabled;
        null !== $username && $self['username'] = $username;
        null !== $videosCount && $self['videosCount'] = $videosCount;
        null !== $view && $self['view'] = $view;
        null !== $website && $self['website'] = $website;
        null !== $wishlist && $self['wishlist'] = $wishlist;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAbout(string $about): self
    {
        $self = clone $this;
        $self['about'] = $about;

        return $self;
    }

    public function withArchivedPostsCount(int $archivedPostsCount): self
    {
        $self = clone $this;
        $self['archivedPostsCount'] = $archivedPostsCount;

        return $self;
    }

    public function withAudiosCount(int $audiosCount): self
    {
        $self = clone $this;
        $self['audiosCount'] = $audiosCount;

        return $self;
    }

    public function withAvatar(string $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    public function withAvatarHeaderConverterUpload(
        bool $avatarHeaderConverterUpload
    ): self {
        $self = clone $this;
        $self['avatarHeaderConverterUpload'] = $avatarHeaderConverterUpload;

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

    public function withCanChat(bool $canChat): self
    {
        $self = clone $this;
        $self['canChat'] = $canChat;

        return $self;
    }

    public function withCanCommentStory(bool $canCommentStory): self
    {
        $self = clone $this;
        $self['canCommentStory'] = $canCommentStory;

        return $self;
    }

    public function withCanCreatePromotion(bool $canCreatePromotion): self
    {
        $self = clone $this;
        $self['canCreatePromotion'] = $canCreatePromotion;

        return $self;
    }

    public function withCanCreateTrial(bool $canCreateTrial): self
    {
        $self = clone $this;
        $self['canCreateTrial'] = $canCreateTrial;

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

    public function withFavoritedCount(int $favoritedCount): self
    {
        $self = clone $this;
        $self['favoritedCount'] = $favoritedCount;

        return $self;
    }

    public function withFavoritesCount(int $favoritesCount): self
    {
        $self = clone $this;
        $self['favoritesCount'] = $favoritesCount;

        return $self;
    }

    public function withFirstPublishedPostDate(
        string $firstPublishedPostDate
    ): self {
        $self = clone $this;
        $self['firstPublishedPostDate'] = $firstPublishedPostDate;

        return $self;
    }

    public function withHasFriends(bool $hasFriends): self
    {
        $self = clone $this;
        $self['hasFriends'] = $hasFriends;

        return $self;
    }

    public function withHasLabels(bool $hasLabels): self
    {
        $self = clone $this;
        $self['hasLabels'] = $hasLabels;

        return $self;
    }

    public function withHasLinks(bool $hasLinks): self
    {
        $self = clone $this;
        $self['hasLinks'] = $hasLinks;

        return $self;
    }

    public function withHasNotViewedStory(bool $hasNotViewedStory): self
    {
        $self = clone $this;
        $self['hasNotViewedStory'] = $hasNotViewedStory;

        return $self;
    }

    public function withHasPinnedPosts(bool $hasPinnedPosts): self
    {
        $self = clone $this;
        $self['hasPinnedPosts'] = $hasPinnedPosts;

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

    public function withHeader(?string $header): self
    {
        $self = clone $this;
        $self['header'] = $header;

        return $self;
    }

    public function withHeaderSize(?string $headerSize): self
    {
        $self = clone $this;
        $self['headerSize'] = $headerSize;

        return $self;
    }

    public function withHeaderThumbs(?string $headerThumbs): self
    {
        $self = clone $this;
        $self['headerThumbs'] = $headerThumbs;

        return $self;
    }

    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    public function withIsAdultContent(bool $isAdultContent): self
    {
        $self = clone $this;
        $self['isAdultContent'] = $isAdultContent;

        return $self;
    }

    public function withIsBlocked(bool $isBlocked): self
    {
        $self = clone $this;
        $self['isBlocked'] = $isBlocked;

        return $self;
    }

    public function withIsFriend(bool $isFriend): self
    {
        $self = clone $this;
        $self['isFriend'] = $isFriend;

        return $self;
    }

    public function withIsMarkdownDisabledForAbout(
        bool $isMarkdownDisabledForAbout
    ): self {
        $self = clone $this;
        $self['isMarkdownDisabledForAbout'] = $isMarkdownDisabledForAbout;

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

    public function withIsPrivateRestriction(bool $isPrivateRestriction): self
    {
        $self = clone $this;
        $self['isPrivateRestriction'] = $isPrivateRestriction;

        return $self;
    }

    public function withIsRealPerformer(bool $isRealPerformer): self
    {
        $self = clone $this;
        $self['isRealPerformer'] = $isRealPerformer;

        return $self;
    }

    public function withIsReferrerAllowed(bool $isReferrerAllowed): self
    {
        $self = clone $this;
        $self['isReferrerAllowed'] = $isReferrerAllowed;

        return $self;
    }

    public function withIsRestricted(bool $isRestricted): self
    {
        $self = clone $this;
        $self['isRestricted'] = $isRestricted;

        return $self;
    }

    public function withIsSpotifyConnected(bool $isSpotifyConnected): self
    {
        $self = clone $this;
        $self['isSpotifyConnected'] = $isSpotifyConnected;

        return $self;
    }

    public function withIsSpringConnected(bool $isSpringConnected): self
    {
        $self = clone $this;
        $self['isSpringConnected'] = $isSpringConnected;

        return $self;
    }

    public function withIsVerified(bool $isVerified): self
    {
        $self = clone $this;
        $self['isVerified'] = $isVerified;

        return $self;
    }

    public function withJoinDate(string $joinDate): self
    {
        $self = clone $this;
        $self['joinDate'] = $joinDate;

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

    public function withLocation(?string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withMediasCount(int $mediasCount): self
    {
        $self = clone $this;
        $self['mediasCount'] = $mediasCount;

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

    public function withPhotosCount(int $photosCount): self
    {
        $self = clone $this;
        $self['photosCount'] = $photosCount;

        return $self;
    }

    public function withPostsCount(int $postsCount): self
    {
        $self = clone $this;
        $self['postsCount'] = $postsCount;

        return $self;
    }

    public function withPrivateArchivedPostsCount(
        int $privateArchivedPostsCount
    ): self {
        $self = clone $this;
        $self['privateArchivedPostsCount'] = $privateArchivedPostsCount;

        return $self;
    }

    public function withShowMediaCount(bool $showMediaCount): self
    {
        $self = clone $this;
        $self['showMediaCount'] = $showMediaCount;

        return $self;
    }

    public function withShowPostsInFeed(bool $showPostsInFeed): self
    {
        $self = clone $this;
        $self['showPostsInFeed'] = $showPostsInFeed;

        return $self;
    }

    public function withShowSubscribersCount(bool $showSubscribersCount): self
    {
        $self = clone $this;
        $self['showSubscribersCount'] = $showSubscribersCount;

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

    public function withSubscribePrice(int $subscribePrice): self
    {
        $self = clone $this;
        $self['subscribePrice'] = $subscribePrice;

        return $self;
    }

    public function withSubscribersCount(?string $subscribersCount): self
    {
        $self = clone $this;
        $self['subscribersCount'] = $subscribersCount;

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

    public function withVideosCount(int $videosCount): self
    {
        $self = clone $this;
        $self['videosCount'] = $videosCount;

        return $self;
    }

    public function withView(string $view): self
    {
        $self = clone $this;
        $self['view'] = $view;

        return $self;
    }

    public function withWebsite(?string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }

    public function withWishlist(?string $wishlist): self
    {
        $self = clone $this;
        $self['wishlist'] = $wishlist;

        return $self;
    }
}
