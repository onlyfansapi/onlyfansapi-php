<?php

declare(strict_types=1);

namespace OnlyFansAPI\Search\SearchProfilesResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   about?: string|null,
 *   audiosCount?: int|null,
 *   avatarURL?: string|null,
 *   bundles?: string|null,
 *   facebook?: string|null,
 *   fansly?: string|null,
 *   favoritedCount?: int|null,
 *   favoritesCount?: int|null,
 *   headerURL?: string|null,
 *   instagram?: string|null,
 *   isAdultContent?: bool|null,
 *   isPerformer?: bool|null,
 *   isRealPerformer?: bool|null,
 *   isVerified?: bool|null,
 *   joinDate?: string|null,
 *   lastSeenAt?: string|null,
 *   location?: string|null,
 *   manyvids?: string|null,
 *   minSubscribePrice?: int|null,
 *   name?: string|null,
 *   ofapiGender?: string|null,
 *   ofapiGenderConfidence?: float|null,
 *   onlyfansID?: int|null,
 *   photosCount?: int|null,
 *   pornhub?: string|null,
 *   postsCount?: int|null,
 *   promotions?: string|null,
 *   statsUpdatedAt?: string|null,
 *   subscribePrice?: int|null,
 *   subscribersCount?: string|null,
 *   tiktok?: string|null,
 *   twitter?: string|null,
 *   username?: string|null,
 *   videosCount?: int|null,
 *   website?: string|null,
 *   wishlist?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $about;

    #[Optional('audios_count')]
    public ?int $audiosCount;

    #[Optional('avatar_url')]
    public ?string $avatarURL;

    #[Optional(nullable: true)]
    public ?string $bundles;

    #[Optional(nullable: true)]
    public ?string $facebook;

    #[Optional(nullable: true)]
    public ?string $fansly;

    #[Optional('favorited_count')]
    public ?int $favoritedCount;

    #[Optional('favorites_count')]
    public ?int $favoritesCount;

    #[Optional('header_url')]
    public ?string $headerURL;

    #[Optional(nullable: true)]
    public ?string $instagram;

    #[Optional('is_adult_content')]
    public ?bool $isAdultContent;

    #[Optional('is_performer')]
    public ?bool $isPerformer;

    #[Optional('is_real_performer')]
    public ?bool $isRealPerformer;

    #[Optional('is_verified')]
    public ?bool $isVerified;

    #[Optional('join_date')]
    public ?string $joinDate;

    #[Optional('last_seen_at', nullable: true)]
    public ?string $lastSeenAt;

    #[Optional]
    public ?string $location;

    #[Optional(nullable: true)]
    public ?string $manyvids;

    #[Optional('min_subscribe_price')]
    public ?int $minSubscribePrice;

    #[Optional]
    public ?string $name;

    #[Optional('ofapi_gender')]
    public ?string $ofapiGender;

    #[Optional('ofapi_gender_confidence')]
    public ?float $ofapiGenderConfidence;

    #[Optional('onlyfans_id')]
    public ?int $onlyfansID;

    #[Optional('photos_count')]
    public ?int $photosCount;

    #[Optional(nullable: true)]
    public ?string $pornhub;

    #[Optional('posts_count')]
    public ?int $postsCount;

    #[Optional(nullable: true)]
    public ?string $promotions;

    #[Optional('stats_updated_at')]
    public ?string $statsUpdatedAt;

    #[Optional('subscribe_price')]
    public ?int $subscribePrice;

    #[Optional('subscribers_count', nullable: true)]
    public ?string $subscribersCount;

    #[Optional(nullable: true)]
    public ?string $tiktok;

    #[Optional(nullable: true)]
    public ?string $twitter;

    #[Optional]
    public ?string $username;

    #[Optional('videos_count')]
    public ?int $videosCount;

    #[Optional]
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
     */
    public static function with(
        ?string $about = null,
        ?int $audiosCount = null,
        ?string $avatarURL = null,
        ?string $bundles = null,
        ?string $facebook = null,
        ?string $fansly = null,
        ?int $favoritedCount = null,
        ?int $favoritesCount = null,
        ?string $headerURL = null,
        ?string $instagram = null,
        ?bool $isAdultContent = null,
        ?bool $isPerformer = null,
        ?bool $isRealPerformer = null,
        ?bool $isVerified = null,
        ?string $joinDate = null,
        ?string $lastSeenAt = null,
        ?string $location = null,
        ?string $manyvids = null,
        ?int $minSubscribePrice = null,
        ?string $name = null,
        ?string $ofapiGender = null,
        ?float $ofapiGenderConfidence = null,
        ?int $onlyfansID = null,
        ?int $photosCount = null,
        ?string $pornhub = null,
        ?int $postsCount = null,
        ?string $promotions = null,
        ?string $statsUpdatedAt = null,
        ?int $subscribePrice = null,
        ?string $subscribersCount = null,
        ?string $tiktok = null,
        ?string $twitter = null,
        ?string $username = null,
        ?int $videosCount = null,
        ?string $website = null,
        ?string $wishlist = null,
    ): self {
        $self = new self;

        null !== $about && $self['about'] = $about;
        null !== $audiosCount && $self['audiosCount'] = $audiosCount;
        null !== $avatarURL && $self['avatarURL'] = $avatarURL;
        null !== $bundles && $self['bundles'] = $bundles;
        null !== $facebook && $self['facebook'] = $facebook;
        null !== $fansly && $self['fansly'] = $fansly;
        null !== $favoritedCount && $self['favoritedCount'] = $favoritedCount;
        null !== $favoritesCount && $self['favoritesCount'] = $favoritesCount;
        null !== $headerURL && $self['headerURL'] = $headerURL;
        null !== $instagram && $self['instagram'] = $instagram;
        null !== $isAdultContent && $self['isAdultContent'] = $isAdultContent;
        null !== $isPerformer && $self['isPerformer'] = $isPerformer;
        null !== $isRealPerformer && $self['isRealPerformer'] = $isRealPerformer;
        null !== $isVerified && $self['isVerified'] = $isVerified;
        null !== $joinDate && $self['joinDate'] = $joinDate;
        null !== $lastSeenAt && $self['lastSeenAt'] = $lastSeenAt;
        null !== $location && $self['location'] = $location;
        null !== $manyvids && $self['manyvids'] = $manyvids;
        null !== $minSubscribePrice && $self['minSubscribePrice'] = $minSubscribePrice;
        null !== $name && $self['name'] = $name;
        null !== $ofapiGender && $self['ofapiGender'] = $ofapiGender;
        null !== $ofapiGenderConfidence && $self['ofapiGenderConfidence'] = $ofapiGenderConfidence;
        null !== $onlyfansID && $self['onlyfansID'] = $onlyfansID;
        null !== $photosCount && $self['photosCount'] = $photosCount;
        null !== $pornhub && $self['pornhub'] = $pornhub;
        null !== $postsCount && $self['postsCount'] = $postsCount;
        null !== $promotions && $self['promotions'] = $promotions;
        null !== $statsUpdatedAt && $self['statsUpdatedAt'] = $statsUpdatedAt;
        null !== $subscribePrice && $self['subscribePrice'] = $subscribePrice;
        null !== $subscribersCount && $self['subscribersCount'] = $subscribersCount;
        null !== $tiktok && $self['tiktok'] = $tiktok;
        null !== $twitter && $self['twitter'] = $twitter;
        null !== $username && $self['username'] = $username;
        null !== $videosCount && $self['videosCount'] = $videosCount;
        null !== $website && $self['website'] = $website;
        null !== $wishlist && $self['wishlist'] = $wishlist;

        return $self;
    }

    public function withAbout(string $about): self
    {
        $self = clone $this;
        $self['about'] = $about;

        return $self;
    }

    public function withAudiosCount(int $audiosCount): self
    {
        $self = clone $this;
        $self['audiosCount'] = $audiosCount;

        return $self;
    }

    public function withAvatarURL(string $avatarURL): self
    {
        $self = clone $this;
        $self['avatarURL'] = $avatarURL;

        return $self;
    }

    public function withBundles(?string $bundles): self
    {
        $self = clone $this;
        $self['bundles'] = $bundles;

        return $self;
    }

    public function withFacebook(?string $facebook): self
    {
        $self = clone $this;
        $self['facebook'] = $facebook;

        return $self;
    }

    public function withFansly(?string $fansly): self
    {
        $self = clone $this;
        $self['fansly'] = $fansly;

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

    public function withHeaderURL(string $headerURL): self
    {
        $self = clone $this;
        $self['headerURL'] = $headerURL;

        return $self;
    }

    public function withInstagram(?string $instagram): self
    {
        $self = clone $this;
        $self['instagram'] = $instagram;

        return $self;
    }

    public function withIsAdultContent(bool $isAdultContent): self
    {
        $self = clone $this;
        $self['isAdultContent'] = $isAdultContent;

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

    public function withLastSeenAt(?string $lastSeenAt): self
    {
        $self = clone $this;
        $self['lastSeenAt'] = $lastSeenAt;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    public function withManyvids(?string $manyvids): self
    {
        $self = clone $this;
        $self['manyvids'] = $manyvids;

        return $self;
    }

    public function withMinSubscribePrice(int $minSubscribePrice): self
    {
        $self = clone $this;
        $self['minSubscribePrice'] = $minSubscribePrice;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOfapiGender(string $ofapiGender): self
    {
        $self = clone $this;
        $self['ofapiGender'] = $ofapiGender;

        return $self;
    }

    public function withOfapiGenderConfidence(
        float $ofapiGenderConfidence
    ): self {
        $self = clone $this;
        $self['ofapiGenderConfidence'] = $ofapiGenderConfidence;

        return $self;
    }

    public function withOnlyfansID(int $onlyfansID): self
    {
        $self = clone $this;
        $self['onlyfansID'] = $onlyfansID;

        return $self;
    }

    public function withPhotosCount(int $photosCount): self
    {
        $self = clone $this;
        $self['photosCount'] = $photosCount;

        return $self;
    }

    public function withPornhub(?string $pornhub): self
    {
        $self = clone $this;
        $self['pornhub'] = $pornhub;

        return $self;
    }

    public function withPostsCount(int $postsCount): self
    {
        $self = clone $this;
        $self['postsCount'] = $postsCount;

        return $self;
    }

    public function withPromotions(?string $promotions): self
    {
        $self = clone $this;
        $self['promotions'] = $promotions;

        return $self;
    }

    public function withStatsUpdatedAt(string $statsUpdatedAt): self
    {
        $self = clone $this;
        $self['statsUpdatedAt'] = $statsUpdatedAt;

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

    public function withTiktok(?string $tiktok): self
    {
        $self = clone $this;
        $self['tiktok'] = $tiktok;

        return $self;
    }

    public function withTwitter(?string $twitter): self
    {
        $self = clone $this;
        $self['twitter'] = $twitter;

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

    public function withWebsite(string $website): self
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
