<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersResponse\Data\List_\AvatarThumbs;

/**
 * @phpstan-import-type AvatarThumbsShape from \Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersResponse\Data\List_\AvatarThumbs
 *
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   avatar?: string|null,
 *   avatarThumbs?: null|AvatarThumbs|AvatarThumbsShape,
 *   canAddSubscriber?: bool|null,
 *   canCommentStory?: bool|null,
 *   canEarn?: bool|null,
 *   canLookStory?: bool|null,
 *   canPayInternal?: bool|null,
 *   canReport?: bool|null,
 *   canRestrict?: bool|null,
 *   currentSubscribePrice?: string|null,
 *   displayName?: string|null,
 *   hasNotViewedStory?: bool|null,
 *   hasScheduledStream?: bool|null,
 *   hasStories?: bool|null,
 *   hasStream?: bool|null,
 *   header?: string|null,
 *   headerSize?: string|null,
 *   headerThumbs?: string|null,
 *   isRestricted?: bool|null,
 *   isVerified?: bool|null,
 *   lastSeen?: string|null,
 *   name?: string|null,
 *   notice?: string|null,
 *   subscribedBy?: bool|null,
 *   subscribedByAutoprolong?: string|null,
 *   subscribedByExpire?: string|null,
 *   subscribedByExpireDate?: string|null,
 *   subscribedIsExpiredNow?: string|null,
 *   subscribedOn?: bool|null,
 *   subscribedOnDuration?: string|null,
 *   subscribedOnExpiredNow?: bool|null,
 *   subscribePrice?: int|null,
 *   tipsEnabled?: bool|null,
 *   tipsMax?: int|null,
 *   tipsMin?: int|null,
 *   tipsMinInternal?: int|null,
 *   tipsTextEnabled?: bool|null,
 *   username?: string|null,
 *   view?: string|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
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
    public ?bool $canReport;

    #[Optional]
    public ?bool $canRestrict;

    #[Optional]
    public ?string $currentSubscribePrice;

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
    public ?string $headerSize;

    #[Optional]
    public ?string $headerThumbs;

    #[Optional]
    public ?bool $isRestricted;

    #[Optional]
    public ?bool $isVerified;

    #[Optional]
    public ?string $lastSeen;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $notice;

    #[Optional]
    public ?bool $subscribedBy;

    #[Optional]
    public ?string $subscribedByAutoprolong;

    #[Optional]
    public ?string $subscribedByExpire;

    #[Optional]
    public ?string $subscribedByExpireDate;

    #[Optional]
    public ?string $subscribedIsExpiredNow;

    #[Optional]
    public ?bool $subscribedOn;

    #[Optional]
    public ?string $subscribedOnDuration;

    #[Optional]
    public ?bool $subscribedOnExpiredNow;

    #[Optional]
    public ?int $subscribePrice;

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
        ?bool $canReport = null,
        ?bool $canRestrict = null,
        ?string $currentSubscribePrice = null,
        ?string $displayName = null,
        ?bool $hasNotViewedStory = null,
        ?bool $hasScheduledStream = null,
        ?bool $hasStories = null,
        ?bool $hasStream = null,
        ?string $header = null,
        ?string $headerSize = null,
        ?string $headerThumbs = null,
        ?bool $isRestricted = null,
        ?bool $isVerified = null,
        ?string $lastSeen = null,
        ?string $name = null,
        ?string $notice = null,
        ?bool $subscribedBy = null,
        ?string $subscribedByAutoprolong = null,
        ?string $subscribedByExpire = null,
        ?string $subscribedByExpireDate = null,
        ?string $subscribedIsExpiredNow = null,
        ?bool $subscribedOn = null,
        ?string $subscribedOnDuration = null,
        ?bool $subscribedOnExpiredNow = null,
        ?int $subscribePrice = null,
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
        null !== $canReport && $self['canReport'] = $canReport;
        null !== $canRestrict && $self['canRestrict'] = $canRestrict;
        null !== $currentSubscribePrice && $self['currentSubscribePrice'] = $currentSubscribePrice;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $hasNotViewedStory && $self['hasNotViewedStory'] = $hasNotViewedStory;
        null !== $hasScheduledStream && $self['hasScheduledStream'] = $hasScheduledStream;
        null !== $hasStories && $self['hasStories'] = $hasStories;
        null !== $hasStream && $self['hasStream'] = $hasStream;
        null !== $header && $self['header'] = $header;
        null !== $headerSize && $self['headerSize'] = $headerSize;
        null !== $headerThumbs && $self['headerThumbs'] = $headerThumbs;
        null !== $isRestricted && $self['isRestricted'] = $isRestricted;
        null !== $isVerified && $self['isVerified'] = $isVerified;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $name && $self['name'] = $name;
        null !== $notice && $self['notice'] = $notice;
        null !== $subscribedBy && $self['subscribedBy'] = $subscribedBy;
        null !== $subscribedByAutoprolong && $self['subscribedByAutoprolong'] = $subscribedByAutoprolong;
        null !== $subscribedByExpire && $self['subscribedByExpire'] = $subscribedByExpire;
        null !== $subscribedByExpireDate && $self['subscribedByExpireDate'] = $subscribedByExpireDate;
        null !== $subscribedIsExpiredNow && $self['subscribedIsExpiredNow'] = $subscribedIsExpiredNow;
        null !== $subscribedOn && $self['subscribedOn'] = $subscribedOn;
        null !== $subscribedOnDuration && $self['subscribedOnDuration'] = $subscribedOnDuration;
        null !== $subscribedOnExpiredNow && $self['subscribedOnExpiredNow'] = $subscribedOnExpiredNow;
        null !== $subscribePrice && $self['subscribePrice'] = $subscribePrice;
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

    public function withCurrentSubscribePrice(
        string $currentSubscribePrice
    ): self {
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

    public function withHeaderSize(string $headerSize): self
    {
        $self = clone $this;
        $self['headerSize'] = $headerSize;

        return $self;
    }

    public function withHeaderThumbs(string $headerThumbs): self
    {
        $self = clone $this;
        $self['headerThumbs'] = $headerThumbs;

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
        string $subscribedByAutoprolong
    ): self {
        $self = clone $this;
        $self['subscribedByAutoprolong'] = $subscribedByAutoprolong;

        return $self;
    }

    public function withSubscribedByExpire(string $subscribedByExpire): self
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
        string $subscribedIsExpiredNow
    ): self {
        $self = clone $this;
        $self['subscribedIsExpiredNow'] = $subscribedIsExpiredNow;

        return $self;
    }

    public function withSubscribedOn(bool $subscribedOn): self
    {
        $self = clone $this;
        $self['subscribedOn'] = $subscribedOn;

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
