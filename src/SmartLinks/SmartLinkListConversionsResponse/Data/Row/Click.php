<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data\Row;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ClickShape = array{
 *   id?: string|null,
 *   affS1?: string|null,
 *   affS2?: string|null,
 *   affS3?: string|null,
 *   affS4?: string|null,
 *   affS5?: string|null,
 *   browserDeviceType?: string|null,
 *   browserFamily?: string|null,
 *   browserName?: string|null,
 *   browserPlatform?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: string|null,
 *   externalClickID?: string|null,
 *   fbclid?: string|null,
 *   gclid?: string|null,
 *   grossClicks?: int|null,
 *   ipAddress?: string|null,
 *   isBot?: bool|null,
 *   isDuplicate?: bool|null,
 *   referrer?: string|null,
 *   ttclid?: string|null,
 *   userAgent?: string|null,
 *   utmCampaign?: string|null,
 *   utmContent?: string|null,
 *   utmMedium?: string|null,
 *   utmSource?: string|null,
 *   utmTerm?: string|null,
 * }
 */
final class Click implements BaseModel
{
    /** @use SdkModel<ClickShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('aff_s1')]
    public ?string $affS1;

    #[Optional('aff_s2', nullable: true)]
    public ?string $affS2;

    #[Optional('aff_s3', nullable: true)]
    public ?string $affS3;

    #[Optional('aff_s4', nullable: true)]
    public ?string $affS4;

    #[Optional('aff_s5', nullable: true)]
    public ?string $affS5;

    #[Optional('browser_device_type')]
    public ?string $browserDeviceType;

    #[Optional('browser_family')]
    public ?string $browserFamily;

    #[Optional('browser_name')]
    public ?string $browserName;

    #[Optional('browser_platform')]
    public ?string $browserPlatform;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('external_click_id')]
    public ?string $externalClickID;

    #[Optional(nullable: true)]
    public ?string $fbclid;

    #[Optional]
    public ?string $gclid;

    #[Optional('gross_clicks')]
    public ?int $grossClicks;

    #[Optional('ip_address')]
    public ?string $ipAddress;

    #[Optional('is_bot')]
    public ?bool $isBot;

    #[Optional('is_duplicate')]
    public ?bool $isDuplicate;

    #[Optional]
    public ?string $referrer;

    #[Optional]
    public ?string $ttclid;

    #[Optional('user_agent')]
    public ?string $userAgent;

    #[Optional('utm_campaign')]
    public ?string $utmCampaign;

    #[Optional('utm_content')]
    public ?string $utmContent;

    #[Optional('utm_medium')]
    public ?string $utmMedium;

    #[Optional('utm_source')]
    public ?string $utmSource;

    #[Optional('utm_term')]
    public ?string $utmTerm;

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
        ?string $id = null,
        ?string $affS1 = null,
        ?string $affS2 = null,
        ?string $affS3 = null,
        ?string $affS4 = null,
        ?string $affS5 = null,
        ?string $browserDeviceType = null,
        ?string $browserFamily = null,
        ?string $browserName = null,
        ?string $browserPlatform = null,
        ?string $countryCode = null,
        ?string $createdAt = null,
        ?string $externalClickID = null,
        ?string $fbclid = null,
        ?string $gclid = null,
        ?int $grossClicks = null,
        ?string $ipAddress = null,
        ?bool $isBot = null,
        ?bool $isDuplicate = null,
        ?string $referrer = null,
        ?string $ttclid = null,
        ?string $userAgent = null,
        ?string $utmCampaign = null,
        ?string $utmContent = null,
        ?string $utmMedium = null,
        ?string $utmSource = null,
        ?string $utmTerm = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $affS1 && $self['affS1'] = $affS1;
        null !== $affS2 && $self['affS2'] = $affS2;
        null !== $affS3 && $self['affS3'] = $affS3;
        null !== $affS4 && $self['affS4'] = $affS4;
        null !== $affS5 && $self['affS5'] = $affS5;
        null !== $browserDeviceType && $self['browserDeviceType'] = $browserDeviceType;
        null !== $browserFamily && $self['browserFamily'] = $browserFamily;
        null !== $browserName && $self['browserName'] = $browserName;
        null !== $browserPlatform && $self['browserPlatform'] = $browserPlatform;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $externalClickID && $self['externalClickID'] = $externalClickID;
        null !== $fbclid && $self['fbclid'] = $fbclid;
        null !== $gclid && $self['gclid'] = $gclid;
        null !== $grossClicks && $self['grossClicks'] = $grossClicks;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $isBot && $self['isBot'] = $isBot;
        null !== $isDuplicate && $self['isDuplicate'] = $isDuplicate;
        null !== $referrer && $self['referrer'] = $referrer;
        null !== $ttclid && $self['ttclid'] = $ttclid;
        null !== $userAgent && $self['userAgent'] = $userAgent;
        null !== $utmCampaign && $self['utmCampaign'] = $utmCampaign;
        null !== $utmContent && $self['utmContent'] = $utmContent;
        null !== $utmMedium && $self['utmMedium'] = $utmMedium;
        null !== $utmSource && $self['utmSource'] = $utmSource;
        null !== $utmTerm && $self['utmTerm'] = $utmTerm;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAffS1(string $affS1): self
    {
        $self = clone $this;
        $self['affS1'] = $affS1;

        return $self;
    }

    public function withAffS2(?string $affS2): self
    {
        $self = clone $this;
        $self['affS2'] = $affS2;

        return $self;
    }

    public function withAffS3(?string $affS3): self
    {
        $self = clone $this;
        $self['affS3'] = $affS3;

        return $self;
    }

    public function withAffS4(?string $affS4): self
    {
        $self = clone $this;
        $self['affS4'] = $affS4;

        return $self;
    }

    public function withAffS5(?string $affS5): self
    {
        $self = clone $this;
        $self['affS5'] = $affS5;

        return $self;
    }

    public function withBrowserDeviceType(string $browserDeviceType): self
    {
        $self = clone $this;
        $self['browserDeviceType'] = $browserDeviceType;

        return $self;
    }

    public function withBrowserFamily(string $browserFamily): self
    {
        $self = clone $this;
        $self['browserFamily'] = $browserFamily;

        return $self;
    }

    public function withBrowserName(string $browserName): self
    {
        $self = clone $this;
        $self['browserName'] = $browserName;

        return $self;
    }

    public function withBrowserPlatform(string $browserPlatform): self
    {
        $self = clone $this;
        $self['browserPlatform'] = $browserPlatform;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withExternalClickID(string $externalClickID): self
    {
        $self = clone $this;
        $self['externalClickID'] = $externalClickID;

        return $self;
    }

    public function withFbclid(?string $fbclid): self
    {
        $self = clone $this;
        $self['fbclid'] = $fbclid;

        return $self;
    }

    public function withGclid(string $gclid): self
    {
        $self = clone $this;
        $self['gclid'] = $gclid;

        return $self;
    }

    public function withGrossClicks(int $grossClicks): self
    {
        $self = clone $this;
        $self['grossClicks'] = $grossClicks;

        return $self;
    }

    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    public function withIsBot(bool $isBot): self
    {
        $self = clone $this;
        $self['isBot'] = $isBot;

        return $self;
    }

    public function withIsDuplicate(bool $isDuplicate): self
    {
        $self = clone $this;
        $self['isDuplicate'] = $isDuplicate;

        return $self;
    }

    public function withReferrer(string $referrer): self
    {
        $self = clone $this;
        $self['referrer'] = $referrer;

        return $self;
    }

    public function withTtclid(string $ttclid): self
    {
        $self = clone $this;
        $self['ttclid'] = $ttclid;

        return $self;
    }

    public function withUserAgent(string $userAgent): self
    {
        $self = clone $this;
        $self['userAgent'] = $userAgent;

        return $self;
    }

    public function withUtmCampaign(string $utmCampaign): self
    {
        $self = clone $this;
        $self['utmCampaign'] = $utmCampaign;

        return $self;
    }

    public function withUtmContent(string $utmContent): self
    {
        $self = clone $this;
        $self['utmContent'] = $utmContent;

        return $self;
    }

    public function withUtmMedium(string $utmMedium): self
    {
        $self = clone $this;
        $self['utmMedium'] = $utmMedium;

        return $self;
    }

    public function withUtmSource(string $utmSource): self
    {
        $self = clone $this;
        $self['utmSource'] = $utmSource;

        return $self;
    }

    public function withUtmTerm(string $utmTerm): self
    {
        $self = clone $this;
        $self['utmTerm'] = $utmTerm;

        return $self;
    }
}
