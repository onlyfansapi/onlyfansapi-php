<?php

declare(strict_types=1);

namespace Onlyfansapi\Accounts;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List all connected OnlyFans accounts.
 *
 * @see Onlyfansapi\Services\AccountsService::list()
 *
 * @phpstan-type AccountListParamsShape = array{
 *   onlyfansEmail?: string|null,
 *   onlyfansID?: string|null,
 *   onlyfansUsername?: string|null,
 * }
 */
final class AccountListParams implements BaseModel
{
    /** @use SdkModel<AccountListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optionally, filter by the OnlyFans email.
     */
    #[Optional(nullable: true)]
    public ?string $onlyfansEmail;

    /**
     * Optionally, filter by the OnlyFans ID.
     */
    #[Optional(nullable: true)]
    public ?string $onlyfansID;

    /**
     * Optionally, filter by the OnlyFans username.
     */
    #[Optional(nullable: true)]
    public ?string $onlyfansUsername;

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
        ?string $onlyfansEmail = null,
        ?string $onlyfansID = null,
        ?string $onlyfansUsername = null,
    ): self {
        $self = new self;

        null !== $onlyfansEmail && $self['onlyfansEmail'] = $onlyfansEmail;
        null !== $onlyfansID && $self['onlyfansID'] = $onlyfansID;
        null !== $onlyfansUsername && $self['onlyfansUsername'] = $onlyfansUsername;

        return $self;
    }

    /**
     * Optionally, filter by the OnlyFans email.
     */
    public function withOnlyfansEmail(?string $onlyfansEmail): self
    {
        $self = clone $this;
        $self['onlyfansEmail'] = $onlyfansEmail;

        return $self;
    }

    /**
     * Optionally, filter by the OnlyFans ID.
     */
    public function withOnlyfansID(?string $onlyfansID): self
    {
        $self = clone $this;
        $self['onlyfansID'] = $onlyfansID;

        return $self;
    }

    /**
     * Optionally, filter by the OnlyFans username.
     */
    public function withOnlyfansUsername(?string $onlyfansUsername): self
    {
        $self = clone $this;
        $self['onlyfansUsername'] = $onlyfansUsername;

        return $self;
    }
}
