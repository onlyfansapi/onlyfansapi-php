<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\ChatListResponse;

use Onlyfansapi\Chats\ChatListResponse\Data\Fan;
use Onlyfansapi\Chats\ChatListResponse\Data\LastMessage;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FanShape from \Onlyfansapi\Chats\ChatListResponse\Data\Fan
 * @phpstan-import-type LastMessageShape from \Onlyfansapi\Chats\ChatListResponse\Data\LastMessage
 *
 * @phpstan-type DataShape = array{
 *   canGoToProfile?: bool|null,
 *   canNotSendReason?: bool|null,
 *   canSendMessage?: bool|null,
 *   countPinnedMessages?: int|null,
 *   fan?: null|Fan|FanShape,
 *   hasPurchasedFeed?: bool|null,
 *   hasUnreadTips?: bool|null,
 *   isMutedNotifications?: bool|null,
 *   lastMessage?: null|LastMessage|LastMessageShape,
 *   lastReadMessageID?: int|null,
 *   unreadMessagesCount?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $canGoToProfile;

    #[Optional]
    public ?bool $canNotSendReason;

    #[Optional]
    public ?bool $canSendMessage;

    #[Optional]
    public ?int $countPinnedMessages;

    #[Optional]
    public ?Fan $fan;

    #[Optional]
    public ?bool $hasPurchasedFeed;

    #[Optional]
    public ?bool $hasUnreadTips;

    #[Optional]
    public ?bool $isMutedNotifications;

    #[Optional]
    public ?LastMessage $lastMessage;

    #[Optional('lastReadMessageId')]
    public ?int $lastReadMessageID;

    #[Optional]
    public ?int $unreadMessagesCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Fan|FanShape|null $fan
     * @param LastMessage|LastMessageShape|null $lastMessage
     */
    public static function with(
        ?bool $canGoToProfile = null,
        ?bool $canNotSendReason = null,
        ?bool $canSendMessage = null,
        ?int $countPinnedMessages = null,
        Fan|array|null $fan = null,
        ?bool $hasPurchasedFeed = null,
        ?bool $hasUnreadTips = null,
        ?bool $isMutedNotifications = null,
        LastMessage|array|null $lastMessage = null,
        ?int $lastReadMessageID = null,
        ?int $unreadMessagesCount = null,
    ): self {
        $self = new self;

        null !== $canGoToProfile && $self['canGoToProfile'] = $canGoToProfile;
        null !== $canNotSendReason && $self['canNotSendReason'] = $canNotSendReason;
        null !== $canSendMessage && $self['canSendMessage'] = $canSendMessage;
        null !== $countPinnedMessages && $self['countPinnedMessages'] = $countPinnedMessages;
        null !== $fan && $self['fan'] = $fan;
        null !== $hasPurchasedFeed && $self['hasPurchasedFeed'] = $hasPurchasedFeed;
        null !== $hasUnreadTips && $self['hasUnreadTips'] = $hasUnreadTips;
        null !== $isMutedNotifications && $self['isMutedNotifications'] = $isMutedNotifications;
        null !== $lastMessage && $self['lastMessage'] = $lastMessage;
        null !== $lastReadMessageID && $self['lastReadMessageID'] = $lastReadMessageID;
        null !== $unreadMessagesCount && $self['unreadMessagesCount'] = $unreadMessagesCount;

        return $self;
    }

    public function withCanGoToProfile(bool $canGoToProfile): self
    {
        $self = clone $this;
        $self['canGoToProfile'] = $canGoToProfile;

        return $self;
    }

    public function withCanNotSendReason(bool $canNotSendReason): self
    {
        $self = clone $this;
        $self['canNotSendReason'] = $canNotSendReason;

        return $self;
    }

    public function withCanSendMessage(bool $canSendMessage): self
    {
        $self = clone $this;
        $self['canSendMessage'] = $canSendMessage;

        return $self;
    }

    public function withCountPinnedMessages(int $countPinnedMessages): self
    {
        $self = clone $this;
        $self['countPinnedMessages'] = $countPinnedMessages;

        return $self;
    }

    /**
     * @param Fan|FanShape $fan
     */
    public function withFan(Fan|array $fan): self
    {
        $self = clone $this;
        $self['fan'] = $fan;

        return $self;
    }

    public function withHasPurchasedFeed(bool $hasPurchasedFeed): self
    {
        $self = clone $this;
        $self['hasPurchasedFeed'] = $hasPurchasedFeed;

        return $self;
    }

    public function withHasUnreadTips(bool $hasUnreadTips): self
    {
        $self = clone $this;
        $self['hasUnreadTips'] = $hasUnreadTips;

        return $self;
    }

    public function withIsMutedNotifications(bool $isMutedNotifications): self
    {
        $self = clone $this;
        $self['isMutedNotifications'] = $isMutedNotifications;

        return $self;
    }

    /**
     * @param LastMessage|LastMessageShape $lastMessage
     */
    public function withLastMessage(LastMessage|array $lastMessage): self
    {
        $self = clone $this;
        $self['lastMessage'] = $lastMessage;

        return $self;
    }

    public function withLastReadMessageID(int $lastReadMessageID): self
    {
        $self = clone $this;
        $self['lastReadMessageID'] = $lastReadMessageID;

        return $self;
    }

    public function withUnreadMessagesCount(int $unreadMessagesCount): self
    {
        $self = clone $this;
        $self['unreadMessagesCount'] = $unreadMessagesCount;

        return $self;
    }
}
