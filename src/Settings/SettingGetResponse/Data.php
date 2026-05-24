<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SettingGetResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle;

/**
 * @phpstan-import-type CanAddSubscriberByBundleShape from \Onlyfansapi\Settings\SettingGetResponse\Data\CanAddSubscriberByBundle
 *
 * @phpstan-type DataShape = array{
 *   activityHubAllowed?: bool|null,
 *   activityHubTokens?: list<mixed>|null,
 *   appOtp?: bool|null,
 *   avatarHeaderConverterUpload?: bool|null,
 *   blockedCountries?: list<mixed>|null,
 *   blockedIPs?: list<mixed>|null,
 *   blockedStates?: list<mixed>|null,
 *   bundleMaxPrice?: int|null,
 *   canAcceptMessageOnlyFromFriends?: bool|null,
 *   canAddPhone?: bool|null,
 *   canAddSubscriberByBundle?: null|CanAddSubscriberByBundle|CanAddSubscriberByBundleShape,
 *   canMakeProfileLinks?: bool|null,
 *   canSocialsConnect?: bool|null,
 *   changeEmailStep?: string|null,
 *   changelogUpdates?: int|null,
 *   commentsOnlyForPayers?: bool|null,
 *   confirmEmailSentAt?: string|null,
 *   coStreamingRequestFrom?: string|null,
 *   creatorsCommentsOnlyForFriends?: bool|null,
 *   disableSubscribesOffers?: bool|null,
 *   faceOtp?: bool|null,
 *   forceFaceOtp?: bool|null,
 *   hasPaidPosts?: bool|null,
 *   hasPassword?: bool|null,
 *   hideAfterMassMessages?: bool|null,
 *   importantSubscriptionNotifications?: bool|null,
 *   isAutoFollowBack?: bool|null,
 *   isCoStreamingAllowed?: bool|null,
 *   isDeleteInitiated?: bool|null,
 *   isDrmEnabled?: bool|null,
 *   isEmailNotificationsEnabled?: bool|null,
 *   isMonthlyNewsletters?: bool|null,
 *   isOldLoginRedirect?: bool|null,
 *   isOpenseaConnected?: bool|null,
 *   isOtpAppConnected?: bool|null,
 *   isPrivate?: bool|null,
 *   isSuggestionsOptOut?: bool|null,
 *   isTelegramConnected?: bool|null,
 *   lastSubscriptionExpiredAt?: string|null,
 *   lifeTimeEmailCode?: string|null,
 *   muteTagsInChats?: bool|null,
 *   muteTagsInPosts?: bool|null,
 *   muteTagsInStories?: bool|null,
 *   muteTagsInStreams?: bool|null,
 *   newEmail?: string|null,
 *   notifyOnAllMentions?: bool|null,
 *   phoneLast4?: string|null,
 *   phoneOtp?: bool|null,
 *   recommenderReward?: string|null,
 *   replyOnSubscribe?: bool|null,
 *   sendAwardsTop1?: bool|null,
 *   sendAwardsTop5?: bool|null,
 *   shouldReceiveLessNotifications?: bool|null,
 *   showFriendsToSubscribers?: bool|null,
 *   showFullTextInEmailNotify?: bool|null,
 *   showPostsTips?: bool|null,
 *   showSubscribesOffers?: bool|null,
 *   socialsConnects?: list<mixed>|null,
 *   streamingMuxKey?: string|null,
 *   streamingMuxKeyExpiredAt?: string|null,
 *   streamingMuxServer?: string|null,
 *   streamingObsKey?: string|null,
 *   streamingObsServer?: string|null,
 *   streamingRtmpKey?: string|null,
 *   streamingRtmpServer?: string|null,
 *   strongOtp?: bool|null,
 *   unfollowAutoFollowBack?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $activityHubAllowed;

    /** @var list<mixed>|null $activityHubTokens */
    #[Optional(list: 'mixed')]
    public ?array $activityHubTokens;

    #[Optional]
    public ?bool $appOtp;

    #[Optional]
    public ?bool $avatarHeaderConverterUpload;

    /** @var list<mixed>|null $blockedCountries */
    #[Optional(list: 'mixed')]
    public ?array $blockedCountries;

    /** @var list<mixed>|null $blockedIPs */
    #[Optional('blockedIps', list: 'mixed')]
    public ?array $blockedIPs;

    /** @var list<mixed>|null $blockedStates */
    #[Optional(list: 'mixed')]
    public ?array $blockedStates;

    #[Optional]
    public ?int $bundleMaxPrice;

    #[Optional]
    public ?bool $canAcceptMessageOnlyFromFriends;

    #[Optional]
    public ?bool $canAddPhone;

    #[Optional]
    public ?CanAddSubscriberByBundle $canAddSubscriberByBundle;

    #[Optional]
    public ?bool $canMakeProfileLinks;

    #[Optional]
    public ?bool $canSocialsConnect;

    #[Optional(nullable: true)]
    public ?string $changeEmailStep;

    #[Optional]
    public ?int $changelogUpdates;

    #[Optional]
    public ?bool $commentsOnlyForPayers;

    #[Optional]
    public ?string $confirmEmailSentAt;

    #[Optional]
    public ?string $coStreamingRequestFrom;

    #[Optional]
    public ?bool $creatorsCommentsOnlyForFriends;

    #[Optional]
    public ?bool $disableSubscribesOffers;

    #[Optional]
    public ?bool $faceOtp;

    #[Optional]
    public ?bool $forceFaceOtp;

    #[Optional]
    public ?bool $hasPaidPosts;

    #[Optional]
    public ?bool $hasPassword;

    #[Optional]
    public ?bool $hideAfterMassMessages;

    #[Optional]
    public ?bool $importantSubscriptionNotifications;

    #[Optional]
    public ?bool $isAutoFollowBack;

    #[Optional]
    public ?bool $isCoStreamingAllowed;

    #[Optional]
    public ?bool $isDeleteInitiated;

    #[Optional]
    public ?bool $isDrmEnabled;

    #[Optional]
    public ?bool $isEmailNotificationsEnabled;

    #[Optional]
    public ?bool $isMonthlyNewsletters;

    #[Optional]
    public ?bool $isOldLoginRedirect;

    #[Optional]
    public ?bool $isOpenseaConnected;

    #[Optional]
    public ?bool $isOtpAppConnected;

    #[Optional]
    public ?bool $isPrivate;

    #[Optional]
    public ?bool $isSuggestionsOptOut;

    #[Optional]
    public ?bool $isTelegramConnected;

    #[Optional(nullable: true)]
    public ?string $lastSubscriptionExpiredAt;

    #[Optional(nullable: true)]
    public ?string $lifeTimeEmailCode;

    #[Optional]
    public ?bool $muteTagsInChats;

    #[Optional]
    public ?bool $muteTagsInPosts;

    #[Optional]
    public ?bool $muteTagsInStories;

    #[Optional]
    public ?bool $muteTagsInStreams;

    #[Optional(nullable: true)]
    public ?string $newEmail;

    #[Optional]
    public ?bool $notifyOnAllMentions;

    #[Optional(nullable: true)]
    public ?string $phoneLast4;

    #[Optional]
    public ?bool $phoneOtp;

    #[Optional(nullable: true)]
    public ?string $recommenderReward;

    #[Optional]
    public ?bool $replyOnSubscribe;

    #[Optional]
    public ?bool $sendAwardsTop1;

    #[Optional]
    public ?bool $sendAwardsTop5;

    #[Optional]
    public ?bool $shouldReceiveLessNotifications;

    #[Optional]
    public ?bool $showFriendsToSubscribers;

    #[Optional]
    public ?bool $showFullTextInEmailNotify;

    #[Optional]
    public ?bool $showPostsTips;

    #[Optional]
    public ?bool $showSubscribesOffers;

    /** @var list<mixed>|null $socialsConnects */
    #[Optional(list: 'mixed')]
    public ?array $socialsConnects;

    #[Optional(nullable: true)]
    public ?string $streamingMuxKey;

    #[Optional(nullable: true)]
    public ?string $streamingMuxKeyExpiredAt;

    #[Optional]
    public ?string $streamingMuxServer;

    #[Optional]
    public ?string $streamingObsKey;

    #[Optional]
    public ?string $streamingObsServer;

    #[Optional]
    public ?string $streamingRtmpKey;

    #[Optional]
    public ?string $streamingRtmpServer;

    #[Optional]
    public ?bool $strongOtp;

    #[Optional]
    public ?bool $unfollowAutoFollowBack;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $activityHubTokens
     * @param list<mixed>|null $blockedCountries
     * @param list<mixed>|null $blockedIPs
     * @param list<mixed>|null $blockedStates
     * @param CanAddSubscriberByBundle|CanAddSubscriberByBundleShape|null $canAddSubscriberByBundle
     * @param list<mixed>|null $socialsConnects
     */
    public static function with(
        ?bool $activityHubAllowed = null,
        ?array $activityHubTokens = null,
        ?bool $appOtp = null,
        ?bool $avatarHeaderConverterUpload = null,
        ?array $blockedCountries = null,
        ?array $blockedIPs = null,
        ?array $blockedStates = null,
        ?int $bundleMaxPrice = null,
        ?bool $canAcceptMessageOnlyFromFriends = null,
        ?bool $canAddPhone = null,
        CanAddSubscriberByBundle|array|null $canAddSubscriberByBundle = null,
        ?bool $canMakeProfileLinks = null,
        ?bool $canSocialsConnect = null,
        ?string $changeEmailStep = null,
        ?int $changelogUpdates = null,
        ?bool $commentsOnlyForPayers = null,
        ?string $confirmEmailSentAt = null,
        ?string $coStreamingRequestFrom = null,
        ?bool $creatorsCommentsOnlyForFriends = null,
        ?bool $disableSubscribesOffers = null,
        ?bool $faceOtp = null,
        ?bool $forceFaceOtp = null,
        ?bool $hasPaidPosts = null,
        ?bool $hasPassword = null,
        ?bool $hideAfterMassMessages = null,
        ?bool $importantSubscriptionNotifications = null,
        ?bool $isAutoFollowBack = null,
        ?bool $isCoStreamingAllowed = null,
        ?bool $isDeleteInitiated = null,
        ?bool $isDrmEnabled = null,
        ?bool $isEmailNotificationsEnabled = null,
        ?bool $isMonthlyNewsletters = null,
        ?bool $isOldLoginRedirect = null,
        ?bool $isOpenseaConnected = null,
        ?bool $isOtpAppConnected = null,
        ?bool $isPrivate = null,
        ?bool $isSuggestionsOptOut = null,
        ?bool $isTelegramConnected = null,
        ?string $lastSubscriptionExpiredAt = null,
        ?string $lifeTimeEmailCode = null,
        ?bool $muteTagsInChats = null,
        ?bool $muteTagsInPosts = null,
        ?bool $muteTagsInStories = null,
        ?bool $muteTagsInStreams = null,
        ?string $newEmail = null,
        ?bool $notifyOnAllMentions = null,
        ?string $phoneLast4 = null,
        ?bool $phoneOtp = null,
        ?string $recommenderReward = null,
        ?bool $replyOnSubscribe = null,
        ?bool $sendAwardsTop1 = null,
        ?bool $sendAwardsTop5 = null,
        ?bool $shouldReceiveLessNotifications = null,
        ?bool $showFriendsToSubscribers = null,
        ?bool $showFullTextInEmailNotify = null,
        ?bool $showPostsTips = null,
        ?bool $showSubscribesOffers = null,
        ?array $socialsConnects = null,
        ?string $streamingMuxKey = null,
        ?string $streamingMuxKeyExpiredAt = null,
        ?string $streamingMuxServer = null,
        ?string $streamingObsKey = null,
        ?string $streamingObsServer = null,
        ?string $streamingRtmpKey = null,
        ?string $streamingRtmpServer = null,
        ?bool $strongOtp = null,
        ?bool $unfollowAutoFollowBack = null,
    ): self {
        $self = new self;

        null !== $activityHubAllowed && $self['activityHubAllowed'] = $activityHubAllowed;
        null !== $activityHubTokens && $self['activityHubTokens'] = $activityHubTokens;
        null !== $appOtp && $self['appOtp'] = $appOtp;
        null !== $avatarHeaderConverterUpload && $self['avatarHeaderConverterUpload'] = $avatarHeaderConverterUpload;
        null !== $blockedCountries && $self['blockedCountries'] = $blockedCountries;
        null !== $blockedIPs && $self['blockedIPs'] = $blockedIPs;
        null !== $blockedStates && $self['blockedStates'] = $blockedStates;
        null !== $bundleMaxPrice && $self['bundleMaxPrice'] = $bundleMaxPrice;
        null !== $canAcceptMessageOnlyFromFriends && $self['canAcceptMessageOnlyFromFriends'] = $canAcceptMessageOnlyFromFriends;
        null !== $canAddPhone && $self['canAddPhone'] = $canAddPhone;
        null !== $canAddSubscriberByBundle && $self['canAddSubscriberByBundle'] = $canAddSubscriberByBundle;
        null !== $canMakeProfileLinks && $self['canMakeProfileLinks'] = $canMakeProfileLinks;
        null !== $canSocialsConnect && $self['canSocialsConnect'] = $canSocialsConnect;
        null !== $changeEmailStep && $self['changeEmailStep'] = $changeEmailStep;
        null !== $changelogUpdates && $self['changelogUpdates'] = $changelogUpdates;
        null !== $commentsOnlyForPayers && $self['commentsOnlyForPayers'] = $commentsOnlyForPayers;
        null !== $confirmEmailSentAt && $self['confirmEmailSentAt'] = $confirmEmailSentAt;
        null !== $coStreamingRequestFrom && $self['coStreamingRequestFrom'] = $coStreamingRequestFrom;
        null !== $creatorsCommentsOnlyForFriends && $self['creatorsCommentsOnlyForFriends'] = $creatorsCommentsOnlyForFriends;
        null !== $disableSubscribesOffers && $self['disableSubscribesOffers'] = $disableSubscribesOffers;
        null !== $faceOtp && $self['faceOtp'] = $faceOtp;
        null !== $forceFaceOtp && $self['forceFaceOtp'] = $forceFaceOtp;
        null !== $hasPaidPosts && $self['hasPaidPosts'] = $hasPaidPosts;
        null !== $hasPassword && $self['hasPassword'] = $hasPassword;
        null !== $hideAfterMassMessages && $self['hideAfterMassMessages'] = $hideAfterMassMessages;
        null !== $importantSubscriptionNotifications && $self['importantSubscriptionNotifications'] = $importantSubscriptionNotifications;
        null !== $isAutoFollowBack && $self['isAutoFollowBack'] = $isAutoFollowBack;
        null !== $isCoStreamingAllowed && $self['isCoStreamingAllowed'] = $isCoStreamingAllowed;
        null !== $isDeleteInitiated && $self['isDeleteInitiated'] = $isDeleteInitiated;
        null !== $isDrmEnabled && $self['isDrmEnabled'] = $isDrmEnabled;
        null !== $isEmailNotificationsEnabled && $self['isEmailNotificationsEnabled'] = $isEmailNotificationsEnabled;
        null !== $isMonthlyNewsletters && $self['isMonthlyNewsletters'] = $isMonthlyNewsletters;
        null !== $isOldLoginRedirect && $self['isOldLoginRedirect'] = $isOldLoginRedirect;
        null !== $isOpenseaConnected && $self['isOpenseaConnected'] = $isOpenseaConnected;
        null !== $isOtpAppConnected && $self['isOtpAppConnected'] = $isOtpAppConnected;
        null !== $isPrivate && $self['isPrivate'] = $isPrivate;
        null !== $isSuggestionsOptOut && $self['isSuggestionsOptOut'] = $isSuggestionsOptOut;
        null !== $isTelegramConnected && $self['isTelegramConnected'] = $isTelegramConnected;
        null !== $lastSubscriptionExpiredAt && $self['lastSubscriptionExpiredAt'] = $lastSubscriptionExpiredAt;
        null !== $lifeTimeEmailCode && $self['lifeTimeEmailCode'] = $lifeTimeEmailCode;
        null !== $muteTagsInChats && $self['muteTagsInChats'] = $muteTagsInChats;
        null !== $muteTagsInPosts && $self['muteTagsInPosts'] = $muteTagsInPosts;
        null !== $muteTagsInStories && $self['muteTagsInStories'] = $muteTagsInStories;
        null !== $muteTagsInStreams && $self['muteTagsInStreams'] = $muteTagsInStreams;
        null !== $newEmail && $self['newEmail'] = $newEmail;
        null !== $notifyOnAllMentions && $self['notifyOnAllMentions'] = $notifyOnAllMentions;
        null !== $phoneLast4 && $self['phoneLast4'] = $phoneLast4;
        null !== $phoneOtp && $self['phoneOtp'] = $phoneOtp;
        null !== $recommenderReward && $self['recommenderReward'] = $recommenderReward;
        null !== $replyOnSubscribe && $self['replyOnSubscribe'] = $replyOnSubscribe;
        null !== $sendAwardsTop1 && $self['sendAwardsTop1'] = $sendAwardsTop1;
        null !== $sendAwardsTop5 && $self['sendAwardsTop5'] = $sendAwardsTop5;
        null !== $shouldReceiveLessNotifications && $self['shouldReceiveLessNotifications'] = $shouldReceiveLessNotifications;
        null !== $showFriendsToSubscribers && $self['showFriendsToSubscribers'] = $showFriendsToSubscribers;
        null !== $showFullTextInEmailNotify && $self['showFullTextInEmailNotify'] = $showFullTextInEmailNotify;
        null !== $showPostsTips && $self['showPostsTips'] = $showPostsTips;
        null !== $showSubscribesOffers && $self['showSubscribesOffers'] = $showSubscribesOffers;
        null !== $socialsConnects && $self['socialsConnects'] = $socialsConnects;
        null !== $streamingMuxKey && $self['streamingMuxKey'] = $streamingMuxKey;
        null !== $streamingMuxKeyExpiredAt && $self['streamingMuxKeyExpiredAt'] = $streamingMuxKeyExpiredAt;
        null !== $streamingMuxServer && $self['streamingMuxServer'] = $streamingMuxServer;
        null !== $streamingObsKey && $self['streamingObsKey'] = $streamingObsKey;
        null !== $streamingObsServer && $self['streamingObsServer'] = $streamingObsServer;
        null !== $streamingRtmpKey && $self['streamingRtmpKey'] = $streamingRtmpKey;
        null !== $streamingRtmpServer && $self['streamingRtmpServer'] = $streamingRtmpServer;
        null !== $strongOtp && $self['strongOtp'] = $strongOtp;
        null !== $unfollowAutoFollowBack && $self['unfollowAutoFollowBack'] = $unfollowAutoFollowBack;

        return $self;
    }

    public function withActivityHubAllowed(bool $activityHubAllowed): self
    {
        $self = clone $this;
        $self['activityHubAllowed'] = $activityHubAllowed;

        return $self;
    }

    /**
     * @param list<mixed> $activityHubTokens
     */
    public function withActivityHubTokens(array $activityHubTokens): self
    {
        $self = clone $this;
        $self['activityHubTokens'] = $activityHubTokens;

        return $self;
    }

    public function withAppOtp(bool $appOtp): self
    {
        $self = clone $this;
        $self['appOtp'] = $appOtp;

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
     * @param list<mixed> $blockedCountries
     */
    public function withBlockedCountries(array $blockedCountries): self
    {
        $self = clone $this;
        $self['blockedCountries'] = $blockedCountries;

        return $self;
    }

    /**
     * @param list<mixed> $blockedIPs
     */
    public function withBlockedIPs(array $blockedIPs): self
    {
        $self = clone $this;
        $self['blockedIPs'] = $blockedIPs;

        return $self;
    }

    /**
     * @param list<mixed> $blockedStates
     */
    public function withBlockedStates(array $blockedStates): self
    {
        $self = clone $this;
        $self['blockedStates'] = $blockedStates;

        return $self;
    }

    public function withBundleMaxPrice(int $bundleMaxPrice): self
    {
        $self = clone $this;
        $self['bundleMaxPrice'] = $bundleMaxPrice;

        return $self;
    }

    public function withCanAcceptMessageOnlyFromFriends(
        bool $canAcceptMessageOnlyFromFriends
    ): self {
        $self = clone $this;
        $self['canAcceptMessageOnlyFromFriends'] = $canAcceptMessageOnlyFromFriends;

        return $self;
    }

    public function withCanAddPhone(bool $canAddPhone): self
    {
        $self = clone $this;
        $self['canAddPhone'] = $canAddPhone;

        return $self;
    }

    /**
     * @param CanAddSubscriberByBundle|CanAddSubscriberByBundleShape $canAddSubscriberByBundle
     */
    public function withCanAddSubscriberByBundle(
        CanAddSubscriberByBundle|array $canAddSubscriberByBundle
    ): self {
        $self = clone $this;
        $self['canAddSubscriberByBundle'] = $canAddSubscriberByBundle;

        return $self;
    }

    public function withCanMakeProfileLinks(bool $canMakeProfileLinks): self
    {
        $self = clone $this;
        $self['canMakeProfileLinks'] = $canMakeProfileLinks;

        return $self;
    }

    public function withCanSocialsConnect(bool $canSocialsConnect): self
    {
        $self = clone $this;
        $self['canSocialsConnect'] = $canSocialsConnect;

        return $self;
    }

    public function withChangeEmailStep(?string $changeEmailStep): self
    {
        $self = clone $this;
        $self['changeEmailStep'] = $changeEmailStep;

        return $self;
    }

    public function withChangelogUpdates(int $changelogUpdates): self
    {
        $self = clone $this;
        $self['changelogUpdates'] = $changelogUpdates;

        return $self;
    }

    public function withCommentsOnlyForPayers(bool $commentsOnlyForPayers): self
    {
        $self = clone $this;
        $self['commentsOnlyForPayers'] = $commentsOnlyForPayers;

        return $self;
    }

    public function withConfirmEmailSentAt(string $confirmEmailSentAt): self
    {
        $self = clone $this;
        $self['confirmEmailSentAt'] = $confirmEmailSentAt;

        return $self;
    }

    public function withCoStreamingRequestFrom(
        string $coStreamingRequestFrom
    ): self {
        $self = clone $this;
        $self['coStreamingRequestFrom'] = $coStreamingRequestFrom;

        return $self;
    }

    public function withCreatorsCommentsOnlyForFriends(
        bool $creatorsCommentsOnlyForFriends
    ): self {
        $self = clone $this;
        $self['creatorsCommentsOnlyForFriends'] = $creatorsCommentsOnlyForFriends;

        return $self;
    }

    public function withDisableSubscribesOffers(
        bool $disableSubscribesOffers
    ): self {
        $self = clone $this;
        $self['disableSubscribesOffers'] = $disableSubscribesOffers;

        return $self;
    }

    public function withFaceOtp(bool $faceOtp): self
    {
        $self = clone $this;
        $self['faceOtp'] = $faceOtp;

        return $self;
    }

    public function withForceFaceOtp(bool $forceFaceOtp): self
    {
        $self = clone $this;
        $self['forceFaceOtp'] = $forceFaceOtp;

        return $self;
    }

    public function withHasPaidPosts(bool $hasPaidPosts): self
    {
        $self = clone $this;
        $self['hasPaidPosts'] = $hasPaidPosts;

        return $self;
    }

    public function withHasPassword(bool $hasPassword): self
    {
        $self = clone $this;
        $self['hasPassword'] = $hasPassword;

        return $self;
    }

    public function withHideAfterMassMessages(bool $hideAfterMassMessages): self
    {
        $self = clone $this;
        $self['hideAfterMassMessages'] = $hideAfterMassMessages;

        return $self;
    }

    public function withImportantSubscriptionNotifications(
        bool $importantSubscriptionNotifications
    ): self {
        $self = clone $this;
        $self['importantSubscriptionNotifications'] = $importantSubscriptionNotifications;

        return $self;
    }

    public function withIsAutoFollowBack(bool $isAutoFollowBack): self
    {
        $self = clone $this;
        $self['isAutoFollowBack'] = $isAutoFollowBack;

        return $self;
    }

    public function withIsCoStreamingAllowed(bool $isCoStreamingAllowed): self
    {
        $self = clone $this;
        $self['isCoStreamingAllowed'] = $isCoStreamingAllowed;

        return $self;
    }

    public function withIsDeleteInitiated(bool $isDeleteInitiated): self
    {
        $self = clone $this;
        $self['isDeleteInitiated'] = $isDeleteInitiated;

        return $self;
    }

    public function withIsDrmEnabled(bool $isDrmEnabled): self
    {
        $self = clone $this;
        $self['isDrmEnabled'] = $isDrmEnabled;

        return $self;
    }

    public function withIsEmailNotificationsEnabled(
        bool $isEmailNotificationsEnabled
    ): self {
        $self = clone $this;
        $self['isEmailNotificationsEnabled'] = $isEmailNotificationsEnabled;

        return $self;
    }

    public function withIsMonthlyNewsletters(bool $isMonthlyNewsletters): self
    {
        $self = clone $this;
        $self['isMonthlyNewsletters'] = $isMonthlyNewsletters;

        return $self;
    }

    public function withIsOldLoginRedirect(bool $isOldLoginRedirect): self
    {
        $self = clone $this;
        $self['isOldLoginRedirect'] = $isOldLoginRedirect;

        return $self;
    }

    public function withIsOpenseaConnected(bool $isOpenseaConnected): self
    {
        $self = clone $this;
        $self['isOpenseaConnected'] = $isOpenseaConnected;

        return $self;
    }

    public function withIsOtpAppConnected(bool $isOtpAppConnected): self
    {
        $self = clone $this;
        $self['isOtpAppConnected'] = $isOtpAppConnected;

        return $self;
    }

    public function withIsPrivate(bool $isPrivate): self
    {
        $self = clone $this;
        $self['isPrivate'] = $isPrivate;

        return $self;
    }

    public function withIsSuggestionsOptOut(bool $isSuggestionsOptOut): self
    {
        $self = clone $this;
        $self['isSuggestionsOptOut'] = $isSuggestionsOptOut;

        return $self;
    }

    public function withIsTelegramConnected(bool $isTelegramConnected): self
    {
        $self = clone $this;
        $self['isTelegramConnected'] = $isTelegramConnected;

        return $self;
    }

    public function withLastSubscriptionExpiredAt(
        ?string $lastSubscriptionExpiredAt
    ): self {
        $self = clone $this;
        $self['lastSubscriptionExpiredAt'] = $lastSubscriptionExpiredAt;

        return $self;
    }

    public function withLifeTimeEmailCode(?string $lifeTimeEmailCode): self
    {
        $self = clone $this;
        $self['lifeTimeEmailCode'] = $lifeTimeEmailCode;

        return $self;
    }

    public function withMuteTagsInChats(bool $muteTagsInChats): self
    {
        $self = clone $this;
        $self['muteTagsInChats'] = $muteTagsInChats;

        return $self;
    }

    public function withMuteTagsInPosts(bool $muteTagsInPosts): self
    {
        $self = clone $this;
        $self['muteTagsInPosts'] = $muteTagsInPosts;

        return $self;
    }

    public function withMuteTagsInStories(bool $muteTagsInStories): self
    {
        $self = clone $this;
        $self['muteTagsInStories'] = $muteTagsInStories;

        return $self;
    }

    public function withMuteTagsInStreams(bool $muteTagsInStreams): self
    {
        $self = clone $this;
        $self['muteTagsInStreams'] = $muteTagsInStreams;

        return $self;
    }

    public function withNewEmail(?string $newEmail): self
    {
        $self = clone $this;
        $self['newEmail'] = $newEmail;

        return $self;
    }

    public function withNotifyOnAllMentions(bool $notifyOnAllMentions): self
    {
        $self = clone $this;
        $self['notifyOnAllMentions'] = $notifyOnAllMentions;

        return $self;
    }

    public function withPhoneLast4(?string $phoneLast4): self
    {
        $self = clone $this;
        $self['phoneLast4'] = $phoneLast4;

        return $self;
    }

    public function withPhoneOtp(bool $phoneOtp): self
    {
        $self = clone $this;
        $self['phoneOtp'] = $phoneOtp;

        return $self;
    }

    public function withRecommenderReward(?string $recommenderReward): self
    {
        $self = clone $this;
        $self['recommenderReward'] = $recommenderReward;

        return $self;
    }

    public function withReplyOnSubscribe(bool $replyOnSubscribe): self
    {
        $self = clone $this;
        $self['replyOnSubscribe'] = $replyOnSubscribe;

        return $self;
    }

    public function withSendAwardsTop1(bool $sendAwardsTop1): self
    {
        $self = clone $this;
        $self['sendAwardsTop1'] = $sendAwardsTop1;

        return $self;
    }

    public function withSendAwardsTop5(bool $sendAwardsTop5): self
    {
        $self = clone $this;
        $self['sendAwardsTop5'] = $sendAwardsTop5;

        return $self;
    }

    public function withShouldReceiveLessNotifications(
        bool $shouldReceiveLessNotifications
    ): self {
        $self = clone $this;
        $self['shouldReceiveLessNotifications'] = $shouldReceiveLessNotifications;

        return $self;
    }

    public function withShowFriendsToSubscribers(
        bool $showFriendsToSubscribers
    ): self {
        $self = clone $this;
        $self['showFriendsToSubscribers'] = $showFriendsToSubscribers;

        return $self;
    }

    public function withShowFullTextInEmailNotify(
        bool $showFullTextInEmailNotify
    ): self {
        $self = clone $this;
        $self['showFullTextInEmailNotify'] = $showFullTextInEmailNotify;

        return $self;
    }

    public function withShowPostsTips(bool $showPostsTips): self
    {
        $self = clone $this;
        $self['showPostsTips'] = $showPostsTips;

        return $self;
    }

    public function withShowSubscribesOffers(bool $showSubscribesOffers): self
    {
        $self = clone $this;
        $self['showSubscribesOffers'] = $showSubscribesOffers;

        return $self;
    }

    /**
     * @param list<mixed> $socialsConnects
     */
    public function withSocialsConnects(array $socialsConnects): self
    {
        $self = clone $this;
        $self['socialsConnects'] = $socialsConnects;

        return $self;
    }

    public function withStreamingMuxKey(?string $streamingMuxKey): self
    {
        $self = clone $this;
        $self['streamingMuxKey'] = $streamingMuxKey;

        return $self;
    }

    public function withStreamingMuxKeyExpiredAt(
        ?string $streamingMuxKeyExpiredAt
    ): self {
        $self = clone $this;
        $self['streamingMuxKeyExpiredAt'] = $streamingMuxKeyExpiredAt;

        return $self;
    }

    public function withStreamingMuxServer(string $streamingMuxServer): self
    {
        $self = clone $this;
        $self['streamingMuxServer'] = $streamingMuxServer;

        return $self;
    }

    public function withStreamingObsKey(string $streamingObsKey): self
    {
        $self = clone $this;
        $self['streamingObsKey'] = $streamingObsKey;

        return $self;
    }

    public function withStreamingObsServer(string $streamingObsServer): self
    {
        $self = clone $this;
        $self['streamingObsServer'] = $streamingObsServer;

        return $self;
    }

    public function withStreamingRtmpKey(string $streamingRtmpKey): self
    {
        $self = clone $this;
        $self['streamingRtmpKey'] = $streamingRtmpKey;

        return $self;
    }

    public function withStreamingRtmpServer(string $streamingRtmpServer): self
    {
        $self = clone $this;
        $self['streamingRtmpServer'] = $streamingRtmpServer;

        return $self;
    }

    public function withStrongOtp(bool $strongOtp): self
    {
        $self = clone $this;
        $self['strongOtp'] = $strongOtp;

        return $self;
    }

    public function withUnfollowAutoFollowBack(
        bool $unfollowAutoFollowBack
    ): self {
        $self = clone $this;
        $self['unfollowAutoFollowBack'] = $unfollowAutoFollowBack;

        return $self;
    }
}
