<?php

declare(strict_types=1);

namespace OnlyFansAPI\Accounts;

use OnlyFansAPI\Accounts\AccountListResponseItem\OnlyfansUserData;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OnlyfansUserDataShape from \OnlyFansAPI\Accounts\AccountListResponseItem\OnlyfansUserData
 *
 * @phpstan-type AccountListResponseItemShape = array{
 *   id?: string|null,
 *   authenticationProgress?: string|null,
 *   displayName?: string|null,
 *   isAuthenticated?: bool|null,
 *   onlyfansEmail?: string|null,
 *   onlyfansID?: int|null,
 *   onlyfansUserData?: null|OnlyfansUserData|OnlyfansUserDataShape,
 *   onlyfansUsername?: string|null,
 * }
 */
final class AccountListResponseItem implements BaseModel
{
    /** @use SdkModel<AccountListResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('authentication_progress')]
    public ?string $authenticationProgress;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional('is_authenticated')]
    public ?bool $isAuthenticated;

    #[Optional('onlyfans_email')]
    public ?string $onlyfansEmail;

    #[Optional('onlyfans_id')]
    public ?int $onlyfansID;

    #[Optional('onlyfans_user_data')]
    public ?OnlyfansUserData $onlyfansUserData;

    #[Optional('onlyfans_username')]
    public ?string $onlyfansUsername;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OnlyfansUserData|OnlyfansUserDataShape|null $onlyfansUserData
     */
    public static function with(
        ?string $id = null,
        ?string $authenticationProgress = null,
        ?string $displayName = null,
        ?bool $isAuthenticated = null,
        ?string $onlyfansEmail = null,
        ?int $onlyfansID = null,
        OnlyfansUserData|array|null $onlyfansUserData = null,
        ?string $onlyfansUsername = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $authenticationProgress && $self['authenticationProgress'] = $authenticationProgress;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $isAuthenticated && $self['isAuthenticated'] = $isAuthenticated;
        null !== $onlyfansEmail && $self['onlyfansEmail'] = $onlyfansEmail;
        null !== $onlyfansID && $self['onlyfansID'] = $onlyfansID;
        null !== $onlyfansUserData && $self['onlyfansUserData'] = $onlyfansUserData;
        null !== $onlyfansUsername && $self['onlyfansUsername'] = $onlyfansUsername;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAuthenticationProgress(
        string $authenticationProgress
    ): self {
        $self = clone $this;
        $self['authenticationProgress'] = $authenticationProgress;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withIsAuthenticated(bool $isAuthenticated): self
    {
        $self = clone $this;
        $self['isAuthenticated'] = $isAuthenticated;

        return $self;
    }

    public function withOnlyfansEmail(string $onlyfansEmail): self
    {
        $self = clone $this;
        $self['onlyfansEmail'] = $onlyfansEmail;

        return $self;
    }

    public function withOnlyfansID(int $onlyfansID): self
    {
        $self = clone $this;
        $self['onlyfansID'] = $onlyfansID;

        return $self;
    }

    /**
     * @param OnlyfansUserData|OnlyfansUserDataShape $onlyfansUserData
     */
    public function withOnlyfansUserData(
        OnlyfansUserData|array $onlyfansUserData
    ): self {
        $self = clone $this;
        $self['onlyfansUserData'] = $onlyfansUserData;

        return $self;
    }

    public function withOnlyfansUsername(string $onlyfansUsername): self
    {
        $self = clone $this;
        $self['onlyfansUsername'] = $onlyfansUsername;

        return $self;
    }
}
