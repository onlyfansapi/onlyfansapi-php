<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData\AgeVerificationSession;
use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData\HasNewTicketReplies;
use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData\Upload;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgeVerificationSessionShape from \Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData\AgeVerificationSession
 * @phpstan-import-type HasNewTicketRepliesShape from \Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData\HasNewTicketReplies
 * @phpstan-import-type UploadShape from \Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account\OnlyfansData\Upload
 *
 * @phpstan-type OnlyfansDataShape = array{
 *   id?: int|null,
 *   about?: string|null,
 *   advBlock?: list<string>|null,
 *   ageVerificationRequired?: bool|null,
 *   ageVerificationSession?: null|AgeVerificationSession|AgeVerificationSessionShape,
 *   archivedPostsCount?: int|null,
 *   audiosCount?: int|null,
 *   avatar?: string|null,
 *   avatarHeaderConverterUpload?: bool|null,
 *   avatarThumbs?: string|null,
 *   canAddCard?: bool|null,
 *   canAlternativeWalletTopUp?: bool|null,
 *   canChat?: bool|null,
 *   canCommentStory?: bool|null,
 *   canConnectOfAccount?: bool|null,
 *   canCreateLists?: bool|null,
 *   canLookStory?: bool|null,
 *   canPayInternal?: bool|null,
 *   canPinPost?: bool|null,
 *   canReceiveChatMessage?: bool|null,
 *   canSendChatToAll?: bool|null,
 *   chatMessagesCount?: int|null,
 *   connectedOfAccounts?: list<mixed>|null,
 *   countPinnedChat?: int|null,
 *   countPriorityChat?: int|null,
 *   creditBalance?: int|null,
 *   creditsMax?: int|null,
 *   creditsMin?: int|null,
 *   csrf?: string|null,
 *   email?: string|null,
 *   enabledImageEditorForChat?: bool|null,
 *   faceIDRegular?: list<mixed>|null,
 *   favoritedCount?: int|null,
 *   favoritesCount?: int|null,
 *   hasInternalPayments?: bool|null,
 *   hasLabels?: bool|null,
 *   hasNewAlerts?: bool|null,
 *   hasNewChangedPriceSubscriptions?: bool|null,
 *   hasNewHints?: bool|null,
 *   hasNewTicketReplies?: null|HasNewTicketReplies|HasNewTicketRepliesShape,
 *   hasNotViewedStory?: bool|null,
 *   hasPinnedPosts?: bool|null,
 *   hasPurchasedPosts?: bool|null,
 *   hasScenario?: bool|null,
 *   hasSystemNotifications?: bool|null,
 *   hasTags?: bool|null,
 *   hasWatermarkPhoto?: bool|null,
 *   hasWatermarkVideo?: bool|null,
 *   header?: string|null,
 *   headerSize?: string|null,
 *   headerThumbs?: string|null,
 *   ip?: string|null,
 *   isAgeVerified?: bool|null,
 *   isAllowTweets?: bool|null,
 *   isAuth?: bool|null,
 *   isCreditsEnabled?: bool|null,
 *   isDeleteInitiated?: bool|null,
 *   isEmailChecked?: bool|null,
 *   isEmailRequired?: bool|null,
 *   isLegalApprovedAllowed?: bool|null,
 *   isMakePayment?: bool|null,
 *   isMarkdownDisabledForAbout?: bool|null,
 *   isOtpEnabled?: bool|null,
 *   isPaymentCardConnected?: bool|null,
 *   isPaywallPassed?: bool|null,
 *   isPerformer?: bool|null,
 *   isRealCardConnected?: bool|null,
 *   isRealPerformer?: bool|null,
 *   isReferrerAllowed?: bool|null,
 *   isSpotifyConnected?: bool|null,
 *   isTwitterConnected?: bool|null,
 *   isVerified?: bool|null,
 *   isVisibleOnline?: bool|null,
 *   isWalletAutorecharge?: bool|null,
 *   isWantComments?: bool|null,
 *   ivCountry?: string|null,
 *   ivFailReason?: string|null,
 *   ivFlow?: string|null,
 *   ivStatus?: string|null,
 *   joinDate?: string|null,
 *   lastSeen?: string|null,
 *   location?: string|null,
 *   maxPinnedPostsCount?: int|null,
 *   mediasCount?: int|null,
 *   name?: string|null,
 *   needIvApprove?: bool|null,
 *   newTagsCount?: int|null,
 *   notificationsCount?: int|null,
 *   paidFeed?: bool|null,
 *   payoutLegalApproveState?: string|null,
 *   photosCount?: int|null,
 *   pinnedPostsCount?: int|null,
 *   postsCount?: int|null,
 *   privateArchivedPostsCount?: int|null,
 *   showPostsInFeed?: bool|null,
 *   subscribersCount?: int|null,
 *   subscribesCount?: int|null,
 *   twitterUsername?: string|null,
 *   upload?: null|Upload|UploadShape,
 *   username?: string|null,
 *   videosCount?: int|null,
 *   view?: string|null,
 *   walletAutorechargeAmount?: int|null,
 *   walletAutorechargeMin?: int|null,
 *   walletFirstRebills?: bool|null,
 *   watermarkPosition?: string|null,
 *   watermarkText?: string|null,
 *   website?: string|null,
 *   wishlist?: string|null,
 *   wsAuthToken?: string|null,
 *   wsURL?: string|null,
 * }
 */
final class OnlyfansData implements BaseModel
{
    /** @use SdkModel<OnlyfansDataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $about;

    /** @var list<string>|null $advBlock */
    #[Optional(list: 'string')]
    public ?array $advBlock;

    #[Optional]
    public ?bool $ageVerificationRequired;

    #[Optional]
    public ?AgeVerificationSession $ageVerificationSession;

    #[Optional]
    public ?int $archivedPostsCount;

    #[Optional]
    public ?int $audiosCount;

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?bool $avatarHeaderConverterUpload;

    #[Optional]
    public ?string $avatarThumbs;

    #[Optional]
    public ?bool $canAddCard;

    #[Optional]
    public ?bool $canAlternativeWalletTopUp;

    #[Optional]
    public ?bool $canChat;

    #[Optional]
    public ?bool $canCommentStory;

    #[Optional]
    public ?bool $canConnectOfAccount;

    #[Optional]
    public ?bool $canCreateLists;

    #[Optional]
    public ?bool $canLookStory;

    #[Optional]
    public ?bool $canPayInternal;

    #[Optional]
    public ?bool $canPinPost;

    #[Optional]
    public ?bool $canReceiveChatMessage;

    #[Optional]
    public ?bool $canSendChatToAll;

    #[Optional]
    public ?int $chatMessagesCount;

    /** @var list<mixed>|null $connectedOfAccounts */
    #[Optional(list: 'mixed')]
    public ?array $connectedOfAccounts;

    #[Optional]
    public ?int $countPinnedChat;

    #[Optional]
    public ?int $countPriorityChat;

    #[Optional]
    public ?int $creditBalance;

    #[Optional]
    public ?int $creditsMax;

    #[Optional]
    public ?int $creditsMin;

    #[Optional]
    public ?string $csrf;

    #[Optional]
    public ?string $email;

    #[Optional]
    public ?bool $enabledImageEditorForChat;

    /** @var list<mixed>|null $faceIDRegular */
    #[Optional('faceIdRegular', list: 'mixed')]
    public ?array $faceIDRegular;

    #[Optional]
    public ?int $favoritedCount;

    #[Optional]
    public ?int $favoritesCount;

    #[Optional]
    public ?bool $hasInternalPayments;

    #[Optional]
    public ?bool $hasLabels;

    #[Optional]
    public ?bool $hasNewAlerts;

    #[Optional]
    public ?bool $hasNewChangedPriceSubscriptions;

    #[Optional]
    public ?bool $hasNewHints;

    #[Optional]
    public ?HasNewTicketReplies $hasNewTicketReplies;

    #[Optional]
    public ?bool $hasNotViewedStory;

    #[Optional]
    public ?bool $hasPinnedPosts;

    #[Optional]
    public ?bool $hasPurchasedPosts;

    #[Optional]
    public ?bool $hasScenario;

    #[Optional]
    public ?bool $hasSystemNotifications;

    #[Optional]
    public ?bool $hasTags;

    #[Optional]
    public ?bool $hasWatermarkPhoto;

    #[Optional]
    public ?bool $hasWatermarkVideo;

    #[Optional]
    public ?string $header;

    #[Optional]
    public ?string $headerSize;

    #[Optional]
    public ?string $headerThumbs;

    #[Optional]
    public ?string $ip;

    #[Optional]
    public ?bool $isAgeVerified;

    #[Optional]
    public ?bool $isAllowTweets;

    #[Optional]
    public ?bool $isAuth;

    #[Optional]
    public ?bool $isCreditsEnabled;

    #[Optional]
    public ?bool $isDeleteInitiated;

    #[Optional]
    public ?bool $isEmailChecked;

    #[Optional]
    public ?bool $isEmailRequired;

    #[Optional]
    public ?bool $isLegalApprovedAllowed;

    #[Optional]
    public ?bool $isMakePayment;

    #[Optional]
    public ?bool $isMarkdownDisabledForAbout;

    #[Optional]
    public ?bool $isOtpEnabled;

    #[Optional]
    public ?bool $isPaymentCardConnected;

    #[Optional]
    public ?bool $isPaywallPassed;

    #[Optional]
    public ?bool $isPerformer;

    #[Optional]
    public ?bool $isRealCardConnected;

    #[Optional]
    public ?bool $isRealPerformer;

    #[Optional]
    public ?bool $isReferrerAllowed;

    #[Optional]
    public ?bool $isSpotifyConnected;

    #[Optional]
    public ?bool $isTwitterConnected;

    #[Optional]
    public ?bool $isVerified;

    #[Optional]
    public ?bool $isVisibleOnline;

    #[Optional]
    public ?bool $isWalletAutorecharge;

    #[Optional]
    public ?bool $isWantComments;

    #[Optional]
    public ?string $ivCountry;

    #[Optional]
    public ?string $ivFailReason;

    #[Optional]
    public ?string $ivFlow;

    #[Optional]
    public ?string $ivStatus;

    #[Optional]
    public ?string $joinDate;

    #[Optional]
    public ?string $lastSeen;

    #[Optional]
    public ?string $location;

    #[Optional]
    public ?int $maxPinnedPostsCount;

    #[Optional]
    public ?int $mediasCount;

    #[Optional]
    public ?string $name;

    #[Optional('needIVApprove')]
    public ?bool $needIvApprove;

    #[Optional]
    public ?int $newTagsCount;

    #[Optional]
    public ?int $notificationsCount;

    #[Optional]
    public ?bool $paidFeed;

    #[Optional]
    public ?string $payoutLegalApproveState;

    #[Optional]
    public ?int $photosCount;

    #[Optional]
    public ?int $pinnedPostsCount;

    #[Optional]
    public ?int $postsCount;

    #[Optional]
    public ?int $privateArchivedPostsCount;

    #[Optional]
    public ?bool $showPostsInFeed;

    #[Optional]
    public ?int $subscribersCount;

    #[Optional]
    public ?int $subscribesCount;

    #[Optional]
    public ?string $twitterUsername;

    #[Optional]
    public ?Upload $upload;

    #[Optional]
    public ?string $username;

    #[Optional]
    public ?int $videosCount;

    #[Optional]
    public ?string $view;

    #[Optional]
    public ?int $walletAutorechargeAmount;

    #[Optional]
    public ?int $walletAutorechargeMin;

    #[Optional]
    public ?bool $walletFirstRebills;

    #[Optional]
    public ?string $watermarkPosition;

    #[Optional]
    public ?string $watermarkText;

    #[Optional]
    public ?string $website;

    #[Optional]
    public ?string $wishlist;

    #[Optional]
    public ?string $wsAuthToken;

    #[Optional('wsUrl')]
    public ?string $wsURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $advBlock
     * @param AgeVerificationSession|AgeVerificationSessionShape|null $ageVerificationSession
     * @param list<mixed>|null $connectedOfAccounts
     * @param list<mixed>|null $faceIDRegular
     * @param HasNewTicketReplies|HasNewTicketRepliesShape|null $hasNewTicketReplies
     * @param Upload|UploadShape|null $upload
     */
    public static function with(
        ?int $id = null,
        ?string $about = null,
        ?array $advBlock = null,
        ?bool $ageVerificationRequired = null,
        AgeVerificationSession|array|null $ageVerificationSession = null,
        ?int $archivedPostsCount = null,
        ?int $audiosCount = null,
        ?string $avatar = null,
        ?bool $avatarHeaderConverterUpload = null,
        ?string $avatarThumbs = null,
        ?bool $canAddCard = null,
        ?bool $canAlternativeWalletTopUp = null,
        ?bool $canChat = null,
        ?bool $canCommentStory = null,
        ?bool $canConnectOfAccount = null,
        ?bool $canCreateLists = null,
        ?bool $canLookStory = null,
        ?bool $canPayInternal = null,
        ?bool $canPinPost = null,
        ?bool $canReceiveChatMessage = null,
        ?bool $canSendChatToAll = null,
        ?int $chatMessagesCount = null,
        ?array $connectedOfAccounts = null,
        ?int $countPinnedChat = null,
        ?int $countPriorityChat = null,
        ?int $creditBalance = null,
        ?int $creditsMax = null,
        ?int $creditsMin = null,
        ?string $csrf = null,
        ?string $email = null,
        ?bool $enabledImageEditorForChat = null,
        ?array $faceIDRegular = null,
        ?int $favoritedCount = null,
        ?int $favoritesCount = null,
        ?bool $hasInternalPayments = null,
        ?bool $hasLabels = null,
        ?bool $hasNewAlerts = null,
        ?bool $hasNewChangedPriceSubscriptions = null,
        ?bool $hasNewHints = null,
        HasNewTicketReplies|array|null $hasNewTicketReplies = null,
        ?bool $hasNotViewedStory = null,
        ?bool $hasPinnedPosts = null,
        ?bool $hasPurchasedPosts = null,
        ?bool $hasScenario = null,
        ?bool $hasSystemNotifications = null,
        ?bool $hasTags = null,
        ?bool $hasWatermarkPhoto = null,
        ?bool $hasWatermarkVideo = null,
        ?string $header = null,
        ?string $headerSize = null,
        ?string $headerThumbs = null,
        ?string $ip = null,
        ?bool $isAgeVerified = null,
        ?bool $isAllowTweets = null,
        ?bool $isAuth = null,
        ?bool $isCreditsEnabled = null,
        ?bool $isDeleteInitiated = null,
        ?bool $isEmailChecked = null,
        ?bool $isEmailRequired = null,
        ?bool $isLegalApprovedAllowed = null,
        ?bool $isMakePayment = null,
        ?bool $isMarkdownDisabledForAbout = null,
        ?bool $isOtpEnabled = null,
        ?bool $isPaymentCardConnected = null,
        ?bool $isPaywallPassed = null,
        ?bool $isPerformer = null,
        ?bool $isRealCardConnected = null,
        ?bool $isRealPerformer = null,
        ?bool $isReferrerAllowed = null,
        ?bool $isSpotifyConnected = null,
        ?bool $isTwitterConnected = null,
        ?bool $isVerified = null,
        ?bool $isVisibleOnline = null,
        ?bool $isWalletAutorecharge = null,
        ?bool $isWantComments = null,
        ?string $ivCountry = null,
        ?string $ivFailReason = null,
        ?string $ivFlow = null,
        ?string $ivStatus = null,
        ?string $joinDate = null,
        ?string $lastSeen = null,
        ?string $location = null,
        ?int $maxPinnedPostsCount = null,
        ?int $mediasCount = null,
        ?string $name = null,
        ?bool $needIvApprove = null,
        ?int $newTagsCount = null,
        ?int $notificationsCount = null,
        ?bool $paidFeed = null,
        ?string $payoutLegalApproveState = null,
        ?int $photosCount = null,
        ?int $pinnedPostsCount = null,
        ?int $postsCount = null,
        ?int $privateArchivedPostsCount = null,
        ?bool $showPostsInFeed = null,
        ?int $subscribersCount = null,
        ?int $subscribesCount = null,
        ?string $twitterUsername = null,
        Upload|array|null $upload = null,
        ?string $username = null,
        ?int $videosCount = null,
        ?string $view = null,
        ?int $walletAutorechargeAmount = null,
        ?int $walletAutorechargeMin = null,
        ?bool $walletFirstRebills = null,
        ?string $watermarkPosition = null,
        ?string $watermarkText = null,
        ?string $website = null,
        ?string $wishlist = null,
        ?string $wsAuthToken = null,
        ?string $wsURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $about && $self['about'] = $about;
        null !== $advBlock && $self['advBlock'] = $advBlock;
        null !== $ageVerificationRequired && $self['ageVerificationRequired'] = $ageVerificationRequired;
        null !== $ageVerificationSession && $self['ageVerificationSession'] = $ageVerificationSession;
        null !== $archivedPostsCount && $self['archivedPostsCount'] = $archivedPostsCount;
        null !== $audiosCount && $self['audiosCount'] = $audiosCount;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $avatarHeaderConverterUpload && $self['avatarHeaderConverterUpload'] = $avatarHeaderConverterUpload;
        null !== $avatarThumbs && $self['avatarThumbs'] = $avatarThumbs;
        null !== $canAddCard && $self['canAddCard'] = $canAddCard;
        null !== $canAlternativeWalletTopUp && $self['canAlternativeWalletTopUp'] = $canAlternativeWalletTopUp;
        null !== $canChat && $self['canChat'] = $canChat;
        null !== $canCommentStory && $self['canCommentStory'] = $canCommentStory;
        null !== $canConnectOfAccount && $self['canConnectOfAccount'] = $canConnectOfAccount;
        null !== $canCreateLists && $self['canCreateLists'] = $canCreateLists;
        null !== $canLookStory && $self['canLookStory'] = $canLookStory;
        null !== $canPayInternal && $self['canPayInternal'] = $canPayInternal;
        null !== $canPinPost && $self['canPinPost'] = $canPinPost;
        null !== $canReceiveChatMessage && $self['canReceiveChatMessage'] = $canReceiveChatMessage;
        null !== $canSendChatToAll && $self['canSendChatToAll'] = $canSendChatToAll;
        null !== $chatMessagesCount && $self['chatMessagesCount'] = $chatMessagesCount;
        null !== $connectedOfAccounts && $self['connectedOfAccounts'] = $connectedOfAccounts;
        null !== $countPinnedChat && $self['countPinnedChat'] = $countPinnedChat;
        null !== $countPriorityChat && $self['countPriorityChat'] = $countPriorityChat;
        null !== $creditBalance && $self['creditBalance'] = $creditBalance;
        null !== $creditsMax && $self['creditsMax'] = $creditsMax;
        null !== $creditsMin && $self['creditsMin'] = $creditsMin;
        null !== $csrf && $self['csrf'] = $csrf;
        null !== $email && $self['email'] = $email;
        null !== $enabledImageEditorForChat && $self['enabledImageEditorForChat'] = $enabledImageEditorForChat;
        null !== $faceIDRegular && $self['faceIDRegular'] = $faceIDRegular;
        null !== $favoritedCount && $self['favoritedCount'] = $favoritedCount;
        null !== $favoritesCount && $self['favoritesCount'] = $favoritesCount;
        null !== $hasInternalPayments && $self['hasInternalPayments'] = $hasInternalPayments;
        null !== $hasLabels && $self['hasLabels'] = $hasLabels;
        null !== $hasNewAlerts && $self['hasNewAlerts'] = $hasNewAlerts;
        null !== $hasNewChangedPriceSubscriptions && $self['hasNewChangedPriceSubscriptions'] = $hasNewChangedPriceSubscriptions;
        null !== $hasNewHints && $self['hasNewHints'] = $hasNewHints;
        null !== $hasNewTicketReplies && $self['hasNewTicketReplies'] = $hasNewTicketReplies;
        null !== $hasNotViewedStory && $self['hasNotViewedStory'] = $hasNotViewedStory;
        null !== $hasPinnedPosts && $self['hasPinnedPosts'] = $hasPinnedPosts;
        null !== $hasPurchasedPosts && $self['hasPurchasedPosts'] = $hasPurchasedPosts;
        null !== $hasScenario && $self['hasScenario'] = $hasScenario;
        null !== $hasSystemNotifications && $self['hasSystemNotifications'] = $hasSystemNotifications;
        null !== $hasTags && $self['hasTags'] = $hasTags;
        null !== $hasWatermarkPhoto && $self['hasWatermarkPhoto'] = $hasWatermarkPhoto;
        null !== $hasWatermarkVideo && $self['hasWatermarkVideo'] = $hasWatermarkVideo;
        null !== $header && $self['header'] = $header;
        null !== $headerSize && $self['headerSize'] = $headerSize;
        null !== $headerThumbs && $self['headerThumbs'] = $headerThumbs;
        null !== $ip && $self['ip'] = $ip;
        null !== $isAgeVerified && $self['isAgeVerified'] = $isAgeVerified;
        null !== $isAllowTweets && $self['isAllowTweets'] = $isAllowTweets;
        null !== $isAuth && $self['isAuth'] = $isAuth;
        null !== $isCreditsEnabled && $self['isCreditsEnabled'] = $isCreditsEnabled;
        null !== $isDeleteInitiated && $self['isDeleteInitiated'] = $isDeleteInitiated;
        null !== $isEmailChecked && $self['isEmailChecked'] = $isEmailChecked;
        null !== $isEmailRequired && $self['isEmailRequired'] = $isEmailRequired;
        null !== $isLegalApprovedAllowed && $self['isLegalApprovedAllowed'] = $isLegalApprovedAllowed;
        null !== $isMakePayment && $self['isMakePayment'] = $isMakePayment;
        null !== $isMarkdownDisabledForAbout && $self['isMarkdownDisabledForAbout'] = $isMarkdownDisabledForAbout;
        null !== $isOtpEnabled && $self['isOtpEnabled'] = $isOtpEnabled;
        null !== $isPaymentCardConnected && $self['isPaymentCardConnected'] = $isPaymentCardConnected;
        null !== $isPaywallPassed && $self['isPaywallPassed'] = $isPaywallPassed;
        null !== $isPerformer && $self['isPerformer'] = $isPerformer;
        null !== $isRealCardConnected && $self['isRealCardConnected'] = $isRealCardConnected;
        null !== $isRealPerformer && $self['isRealPerformer'] = $isRealPerformer;
        null !== $isReferrerAllowed && $self['isReferrerAllowed'] = $isReferrerAllowed;
        null !== $isSpotifyConnected && $self['isSpotifyConnected'] = $isSpotifyConnected;
        null !== $isTwitterConnected && $self['isTwitterConnected'] = $isTwitterConnected;
        null !== $isVerified && $self['isVerified'] = $isVerified;
        null !== $isVisibleOnline && $self['isVisibleOnline'] = $isVisibleOnline;
        null !== $isWalletAutorecharge && $self['isWalletAutorecharge'] = $isWalletAutorecharge;
        null !== $isWantComments && $self['isWantComments'] = $isWantComments;
        null !== $ivCountry && $self['ivCountry'] = $ivCountry;
        null !== $ivFailReason && $self['ivFailReason'] = $ivFailReason;
        null !== $ivFlow && $self['ivFlow'] = $ivFlow;
        null !== $ivStatus && $self['ivStatus'] = $ivStatus;
        null !== $joinDate && $self['joinDate'] = $joinDate;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $location && $self['location'] = $location;
        null !== $maxPinnedPostsCount && $self['maxPinnedPostsCount'] = $maxPinnedPostsCount;
        null !== $mediasCount && $self['mediasCount'] = $mediasCount;
        null !== $name && $self['name'] = $name;
        null !== $needIvApprove && $self['needIvApprove'] = $needIvApprove;
        null !== $newTagsCount && $self['newTagsCount'] = $newTagsCount;
        null !== $notificationsCount && $self['notificationsCount'] = $notificationsCount;
        null !== $paidFeed && $self['paidFeed'] = $paidFeed;
        null !== $payoutLegalApproveState && $self['payoutLegalApproveState'] = $payoutLegalApproveState;
        null !== $photosCount && $self['photosCount'] = $photosCount;
        null !== $pinnedPostsCount && $self['pinnedPostsCount'] = $pinnedPostsCount;
        null !== $postsCount && $self['postsCount'] = $postsCount;
        null !== $privateArchivedPostsCount && $self['privateArchivedPostsCount'] = $privateArchivedPostsCount;
        null !== $showPostsInFeed && $self['showPostsInFeed'] = $showPostsInFeed;
        null !== $subscribersCount && $self['subscribersCount'] = $subscribersCount;
        null !== $subscribesCount && $self['subscribesCount'] = $subscribesCount;
        null !== $twitterUsername && $self['twitterUsername'] = $twitterUsername;
        null !== $upload && $self['upload'] = $upload;
        null !== $username && $self['username'] = $username;
        null !== $videosCount && $self['videosCount'] = $videosCount;
        null !== $view && $self['view'] = $view;
        null !== $walletAutorechargeAmount && $self['walletAutorechargeAmount'] = $walletAutorechargeAmount;
        null !== $walletAutorechargeMin && $self['walletAutorechargeMin'] = $walletAutorechargeMin;
        null !== $walletFirstRebills && $self['walletFirstRebills'] = $walletFirstRebills;
        null !== $watermarkPosition && $self['watermarkPosition'] = $watermarkPosition;
        null !== $watermarkText && $self['watermarkText'] = $watermarkText;
        null !== $website && $self['website'] = $website;
        null !== $wishlist && $self['wishlist'] = $wishlist;
        null !== $wsAuthToken && $self['wsAuthToken'] = $wsAuthToken;
        null !== $wsURL && $self['wsURL'] = $wsURL;

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

    /**
     * @param list<string> $advBlock
     */
    public function withAdvBlock(array $advBlock): self
    {
        $self = clone $this;
        $self['advBlock'] = $advBlock;

        return $self;
    }

    public function withAgeVerificationRequired(
        bool $ageVerificationRequired
    ): self {
        $self = clone $this;
        $self['ageVerificationRequired'] = $ageVerificationRequired;

        return $self;
    }

    /**
     * @param AgeVerificationSession|AgeVerificationSessionShape $ageVerificationSession
     */
    public function withAgeVerificationSession(
        AgeVerificationSession|array $ageVerificationSession
    ): self {
        $self = clone $this;
        $self['ageVerificationSession'] = $ageVerificationSession;

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

    public function withAvatarThumbs(string $avatarThumbs): self
    {
        $self = clone $this;
        $self['avatarThumbs'] = $avatarThumbs;

        return $self;
    }

    public function withCanAddCard(bool $canAddCard): self
    {
        $self = clone $this;
        $self['canAddCard'] = $canAddCard;

        return $self;
    }

    public function withCanAlternativeWalletTopUp(
        bool $canAlternativeWalletTopUp
    ): self {
        $self = clone $this;
        $self['canAlternativeWalletTopUp'] = $canAlternativeWalletTopUp;

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

    public function withCanConnectOfAccount(bool $canConnectOfAccount): self
    {
        $self = clone $this;
        $self['canConnectOfAccount'] = $canConnectOfAccount;

        return $self;
    }

    public function withCanCreateLists(bool $canCreateLists): self
    {
        $self = clone $this;
        $self['canCreateLists'] = $canCreateLists;

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

    public function withCanPinPost(bool $canPinPost): self
    {
        $self = clone $this;
        $self['canPinPost'] = $canPinPost;

        return $self;
    }

    public function withCanReceiveChatMessage(bool $canReceiveChatMessage): self
    {
        $self = clone $this;
        $self['canReceiveChatMessage'] = $canReceiveChatMessage;

        return $self;
    }

    public function withCanSendChatToAll(bool $canSendChatToAll): self
    {
        $self = clone $this;
        $self['canSendChatToAll'] = $canSendChatToAll;

        return $self;
    }

    public function withChatMessagesCount(int $chatMessagesCount): self
    {
        $self = clone $this;
        $self['chatMessagesCount'] = $chatMessagesCount;

        return $self;
    }

    /**
     * @param list<mixed> $connectedOfAccounts
     */
    public function withConnectedOfAccounts(array $connectedOfAccounts): self
    {
        $self = clone $this;
        $self['connectedOfAccounts'] = $connectedOfAccounts;

        return $self;
    }

    public function withCountPinnedChat(int $countPinnedChat): self
    {
        $self = clone $this;
        $self['countPinnedChat'] = $countPinnedChat;

        return $self;
    }

    public function withCountPriorityChat(int $countPriorityChat): self
    {
        $self = clone $this;
        $self['countPriorityChat'] = $countPriorityChat;

        return $self;
    }

    public function withCreditBalance(int $creditBalance): self
    {
        $self = clone $this;
        $self['creditBalance'] = $creditBalance;

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

    public function withCsrf(string $csrf): self
    {
        $self = clone $this;
        $self['csrf'] = $csrf;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withEnabledImageEditorForChat(
        bool $enabledImageEditorForChat
    ): self {
        $self = clone $this;
        $self['enabledImageEditorForChat'] = $enabledImageEditorForChat;

        return $self;
    }

    /**
     * @param list<mixed> $faceIDRegular
     */
    public function withFaceIDRegular(array $faceIDRegular): self
    {
        $self = clone $this;
        $self['faceIDRegular'] = $faceIDRegular;

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

    public function withHasInternalPayments(bool $hasInternalPayments): self
    {
        $self = clone $this;
        $self['hasInternalPayments'] = $hasInternalPayments;

        return $self;
    }

    public function withHasLabels(bool $hasLabels): self
    {
        $self = clone $this;
        $self['hasLabels'] = $hasLabels;

        return $self;
    }

    public function withHasNewAlerts(bool $hasNewAlerts): self
    {
        $self = clone $this;
        $self['hasNewAlerts'] = $hasNewAlerts;

        return $self;
    }

    public function withHasNewChangedPriceSubscriptions(
        bool $hasNewChangedPriceSubscriptions
    ): self {
        $self = clone $this;
        $self['hasNewChangedPriceSubscriptions'] = $hasNewChangedPriceSubscriptions;

        return $self;
    }

    public function withHasNewHints(bool $hasNewHints): self
    {
        $self = clone $this;
        $self['hasNewHints'] = $hasNewHints;

        return $self;
    }

    /**
     * @param HasNewTicketReplies|HasNewTicketRepliesShape $hasNewTicketReplies
     */
    public function withHasNewTicketReplies(
        HasNewTicketReplies|array $hasNewTicketReplies
    ): self {
        $self = clone $this;
        $self['hasNewTicketReplies'] = $hasNewTicketReplies;

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

    public function withHasPurchasedPosts(bool $hasPurchasedPosts): self
    {
        $self = clone $this;
        $self['hasPurchasedPosts'] = $hasPurchasedPosts;

        return $self;
    }

    public function withHasScenario(bool $hasScenario): self
    {
        $self = clone $this;
        $self['hasScenario'] = $hasScenario;

        return $self;
    }

    public function withHasSystemNotifications(
        bool $hasSystemNotifications
    ): self {
        $self = clone $this;
        $self['hasSystemNotifications'] = $hasSystemNotifications;

        return $self;
    }

    public function withHasTags(bool $hasTags): self
    {
        $self = clone $this;
        $self['hasTags'] = $hasTags;

        return $self;
    }

    public function withHasWatermarkPhoto(bool $hasWatermarkPhoto): self
    {
        $self = clone $this;
        $self['hasWatermarkPhoto'] = $hasWatermarkPhoto;

        return $self;
    }

    public function withHasWatermarkVideo(bool $hasWatermarkVideo): self
    {
        $self = clone $this;
        $self['hasWatermarkVideo'] = $hasWatermarkVideo;

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

    public function withIP(string $ip): self
    {
        $self = clone $this;
        $self['ip'] = $ip;

        return $self;
    }

    public function withIsAgeVerified(bool $isAgeVerified): self
    {
        $self = clone $this;
        $self['isAgeVerified'] = $isAgeVerified;

        return $self;
    }

    public function withIsAllowTweets(bool $isAllowTweets): self
    {
        $self = clone $this;
        $self['isAllowTweets'] = $isAllowTweets;

        return $self;
    }

    public function withIsAuth(bool $isAuth): self
    {
        $self = clone $this;
        $self['isAuth'] = $isAuth;

        return $self;
    }

    public function withIsCreditsEnabled(bool $isCreditsEnabled): self
    {
        $self = clone $this;
        $self['isCreditsEnabled'] = $isCreditsEnabled;

        return $self;
    }

    public function withIsDeleteInitiated(bool $isDeleteInitiated): self
    {
        $self = clone $this;
        $self['isDeleteInitiated'] = $isDeleteInitiated;

        return $self;
    }

    public function withIsEmailChecked(bool $isEmailChecked): self
    {
        $self = clone $this;
        $self['isEmailChecked'] = $isEmailChecked;

        return $self;
    }

    public function withIsEmailRequired(bool $isEmailRequired): self
    {
        $self = clone $this;
        $self['isEmailRequired'] = $isEmailRequired;

        return $self;
    }

    public function withIsLegalApprovedAllowed(
        bool $isLegalApprovedAllowed
    ): self {
        $self = clone $this;
        $self['isLegalApprovedAllowed'] = $isLegalApprovedAllowed;

        return $self;
    }

    public function withIsMakePayment(bool $isMakePayment): self
    {
        $self = clone $this;
        $self['isMakePayment'] = $isMakePayment;

        return $self;
    }

    public function withIsMarkdownDisabledForAbout(
        bool $isMarkdownDisabledForAbout
    ): self {
        $self = clone $this;
        $self['isMarkdownDisabledForAbout'] = $isMarkdownDisabledForAbout;

        return $self;
    }

    public function withIsOtpEnabled(bool $isOtpEnabled): self
    {
        $self = clone $this;
        $self['isOtpEnabled'] = $isOtpEnabled;

        return $self;
    }

    public function withIsPaymentCardConnected(
        bool $isPaymentCardConnected
    ): self {
        $self = clone $this;
        $self['isPaymentCardConnected'] = $isPaymentCardConnected;

        return $self;
    }

    public function withIsPaywallPassed(bool $isPaywallPassed): self
    {
        $self = clone $this;
        $self['isPaywallPassed'] = $isPaywallPassed;

        return $self;
    }

    public function withIsPerformer(bool $isPerformer): self
    {
        $self = clone $this;
        $self['isPerformer'] = $isPerformer;

        return $self;
    }

    public function withIsRealCardConnected(bool $isRealCardConnected): self
    {
        $self = clone $this;
        $self['isRealCardConnected'] = $isRealCardConnected;

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

    public function withIsSpotifyConnected(bool $isSpotifyConnected): self
    {
        $self = clone $this;
        $self['isSpotifyConnected'] = $isSpotifyConnected;

        return $self;
    }

    public function withIsTwitterConnected(bool $isTwitterConnected): self
    {
        $self = clone $this;
        $self['isTwitterConnected'] = $isTwitterConnected;

        return $self;
    }

    public function withIsVerified(bool $isVerified): self
    {
        $self = clone $this;
        $self['isVerified'] = $isVerified;

        return $self;
    }

    public function withIsVisibleOnline(bool $isVisibleOnline): self
    {
        $self = clone $this;
        $self['isVisibleOnline'] = $isVisibleOnline;

        return $self;
    }

    public function withIsWalletAutorecharge(bool $isWalletAutorecharge): self
    {
        $self = clone $this;
        $self['isWalletAutorecharge'] = $isWalletAutorecharge;

        return $self;
    }

    public function withIsWantComments(bool $isWantComments): self
    {
        $self = clone $this;
        $self['isWantComments'] = $isWantComments;

        return $self;
    }

    public function withIvCountry(string $ivCountry): self
    {
        $self = clone $this;
        $self['ivCountry'] = $ivCountry;

        return $self;
    }

    public function withIvFailReason(string $ivFailReason): self
    {
        $self = clone $this;
        $self['ivFailReason'] = $ivFailReason;

        return $self;
    }

    public function withIvFlow(string $ivFlow): self
    {
        $self = clone $this;
        $self['ivFlow'] = $ivFlow;

        return $self;
    }

    public function withIvStatus(string $ivStatus): self
    {
        $self = clone $this;
        $self['ivStatus'] = $ivStatus;

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

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withMaxPinnedPostsCount(int $maxPinnedPostsCount): self
    {
        $self = clone $this;
        $self['maxPinnedPostsCount'] = $maxPinnedPostsCount;

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

    public function withNeedIvApprove(bool $needIvApprove): self
    {
        $self = clone $this;
        $self['needIvApprove'] = $needIvApprove;

        return $self;
    }

    public function withNewTagsCount(int $newTagsCount): self
    {
        $self = clone $this;
        $self['newTagsCount'] = $newTagsCount;

        return $self;
    }

    public function withNotificationsCount(int $notificationsCount): self
    {
        $self = clone $this;
        $self['notificationsCount'] = $notificationsCount;

        return $self;
    }

    public function withPaidFeed(bool $paidFeed): self
    {
        $self = clone $this;
        $self['paidFeed'] = $paidFeed;

        return $self;
    }

    public function withPayoutLegalApproveState(
        string $payoutLegalApproveState
    ): self {
        $self = clone $this;
        $self['payoutLegalApproveState'] = $payoutLegalApproveState;

        return $self;
    }

    public function withPhotosCount(int $photosCount): self
    {
        $self = clone $this;
        $self['photosCount'] = $photosCount;

        return $self;
    }

    public function withPinnedPostsCount(int $pinnedPostsCount): self
    {
        $self = clone $this;
        $self['pinnedPostsCount'] = $pinnedPostsCount;

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

    public function withShowPostsInFeed(bool $showPostsInFeed): self
    {
        $self = clone $this;
        $self['showPostsInFeed'] = $showPostsInFeed;

        return $self;
    }

    public function withSubscribersCount(int $subscribersCount): self
    {
        $self = clone $this;
        $self['subscribersCount'] = $subscribersCount;

        return $self;
    }

    public function withSubscribesCount(int $subscribesCount): self
    {
        $self = clone $this;
        $self['subscribesCount'] = $subscribesCount;

        return $self;
    }

    public function withTwitterUsername(string $twitterUsername): self
    {
        $self = clone $this;
        $self['twitterUsername'] = $twitterUsername;

        return $self;
    }

    /**
     * @param Upload|UploadShape $upload
     */
    public function withUpload(Upload|array $upload): self
    {
        $self = clone $this;
        $self['upload'] = $upload;

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

    public function withWalletAutorechargeAmount(
        int $walletAutorechargeAmount
    ): self {
        $self = clone $this;
        $self['walletAutorechargeAmount'] = $walletAutorechargeAmount;

        return $self;
    }

    public function withWalletAutorechargeMin(int $walletAutorechargeMin): self
    {
        $self = clone $this;
        $self['walletAutorechargeMin'] = $walletAutorechargeMin;

        return $self;
    }

    public function withWalletFirstRebills(bool $walletFirstRebills): self
    {
        $self = clone $this;
        $self['walletFirstRebills'] = $walletFirstRebills;

        return $self;
    }

    public function withWatermarkPosition(string $watermarkPosition): self
    {
        $self = clone $this;
        $self['watermarkPosition'] = $watermarkPosition;

        return $self;
    }

    public function withWatermarkText(string $watermarkText): self
    {
        $self = clone $this;
        $self['watermarkText'] = $watermarkText;

        return $self;
    }

    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }

    public function withWishlist(string $wishlist): self
    {
        $self = clone $this;
        $self['wishlist'] = $wishlist;

        return $self;
    }

    public function withWsAuthToken(string $wsAuthToken): self
    {
        $self = clone $this;
        $self['wsAuthToken'] = $wsAuthToken;

        return $self;
    }

    public function withWsURL(string $wsURL): self
    {
        $self = clone $this;
        $self['wsURL'] = $wsURL;

        return $self;
    }
}
