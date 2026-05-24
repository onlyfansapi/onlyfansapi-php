<?php

declare(strict_types=1);

namespace Onlyfansapi\Authenticate;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account;
use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\LastAttempt;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AccountShape from \Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\Account
 * @phpstan-import-type LastAttemptShape from \Onlyfansapi\Authenticate\AuthenticatePollStatusResponse\LastAttempt
 *
 * @phpstan-type AuthenticatePollStatusResponseShape = array{
 *   account?: null|Account|AccountShape,
 *   lastAttempt?: null|LastAttempt|LastAttemptShape,
 *   progress?: string|null,
 *   state?: string|null,
 * }
 */
final class AuthenticatePollStatusResponse implements BaseModel
{
    /** @use SdkModel<AuthenticatePollStatusResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Account $account;

    #[Optional]
    public ?LastAttempt $lastAttempt;

    #[Optional]
    public ?string $progress;

    #[Optional]
    public ?string $state;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Account|AccountShape|null $account
     * @param LastAttempt|LastAttemptShape|null $lastAttempt
     */
    public static function with(
        Account|array|null $account = null,
        LastAttempt|array|null $lastAttempt = null,
        ?string $progress = null,
        ?string $state = null,
    ): self {
        $self = new self;

        null !== $account && $self['account'] = $account;
        null !== $lastAttempt && $self['lastAttempt'] = $lastAttempt;
        null !== $progress && $self['progress'] = $progress;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    /**
     * @param Account|AccountShape $account
     */
    public function withAccount(Account|array $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * @param LastAttempt|LastAttemptShape $lastAttempt
     */
    public function withLastAttempt(LastAttempt|array $lastAttempt): self
    {
        $self = clone $this;
        $self['lastAttempt'] = $lastAttempt;

        return $self;
    }

    public function withProgress(string $progress): self
    {
        $self = clone $this;
        $self['progress'] = $progress;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
