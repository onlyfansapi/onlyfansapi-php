<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User\AvatarThumbs;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User\HeaderSize;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User\HeaderThumbs;

/**
 * @phpstan-import-type AvatarThumbsShape from \OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User\AvatarThumbs
 * @phpstan-import-type HeaderSizeShape from \OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User\HeaderSize
 * @phpstan-import-type HeaderThumbsShape from \OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User\HeaderThumbs
 *
 * @phpstan-type UserShape = array{
 *   id?: int|null,
 *   avatar?: string|null,
 *   avatarThumbs?: null|AvatarThumbs|AvatarThumbsShape,
 *   canPayInternal?: bool|null,
 *   canTrialSend?: bool|null,
 *   header?: string|null,
 *   headerSize?: null|HeaderSize|HeaderSizeShape,
 *   headerThumbs?: null|HeaderThumbs|HeaderThumbsShape,
 *   isVerified?: bool|null,
 *   name?: string|null,
 *   subscribePrice?: float|null,
 *   tipsEnabled?: bool|null,
 *   tipsMax?: int|null,
 *   tipsMin?: int|null,
 *   tipsMinInternal?: int|null,
 *   username?: string|null,
 *   view?: string|null,
 * }
 */
final class User implements BaseModel
{
    /** @use SdkModel<UserShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $avatar;

    #[Optional]
    public ?AvatarThumbs $avatarThumbs;

    #[Optional]
    public ?bool $canPayInternal;

    #[Optional]
    public ?bool $canTrialSend;

    #[Optional]
    public ?string $header;

    #[Optional]
    public ?HeaderSize $headerSize;

    #[Optional]
    public ?HeaderThumbs $headerThumbs;

    #[Optional]
    public ?bool $isVerified;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?float $subscribePrice;

    #[Optional]
    public ?bool $tipsEnabled;

    #[Optional]
    public ?int $tipsMax;

    #[Optional]
    public ?int $tipsMin;

    #[Optional]
    public ?int $tipsMinInternal;

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
     */
    public static function with(
        ?int $id = null,
        ?string $avatar = null,
        AvatarThumbs|array|null $avatarThumbs = null,
        ?bool $canPayInternal = null,
        ?bool $canTrialSend = null,
        ?string $header = null,
        HeaderSize|array|null $headerSize = null,
        HeaderThumbs|array|null $headerThumbs = null,
        ?bool $isVerified = null,
        ?string $name = null,
        ?float $subscribePrice = null,
        ?bool $tipsEnabled = null,
        ?int $tipsMax = null,
        ?int $tipsMin = null,
        ?int $tipsMinInternal = null,
        ?string $username = null,
        ?string $view = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $avatarThumbs && $self['avatarThumbs'] = $avatarThumbs;
        null !== $canPayInternal && $self['canPayInternal'] = $canPayInternal;
        null !== $canTrialSend && $self['canTrialSend'] = $canTrialSend;
        null !== $header && $self['header'] = $header;
        null !== $headerSize && $self['headerSize'] = $headerSize;
        null !== $headerThumbs && $self['headerThumbs'] = $headerThumbs;
        null !== $isVerified && $self['isVerified'] = $isVerified;
        null !== $name && $self['name'] = $name;
        null !== $subscribePrice && $self['subscribePrice'] = $subscribePrice;
        null !== $tipsEnabled && $self['tipsEnabled'] = $tipsEnabled;
        null !== $tipsMax && $self['tipsMax'] = $tipsMax;
        null !== $tipsMin && $self['tipsMin'] = $tipsMin;
        null !== $tipsMinInternal && $self['tipsMinInternal'] = $tipsMinInternal;
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

    public function withCanPayInternal(bool $canPayInternal): self
    {
        $self = clone $this;
        $self['canPayInternal'] = $canPayInternal;

        return $self;
    }

    public function withCanTrialSend(bool $canTrialSend): self
    {
        $self = clone $this;
        $self['canTrialSend'] = $canTrialSend;

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

    public function withIsVerified(bool $isVerified): self
    {
        $self = clone $this;
        $self['isVerified'] = $isVerified;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSubscribePrice(float $subscribePrice): self
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
