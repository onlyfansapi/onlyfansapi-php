<?php

declare(strict_types=1);

namespace OnlyFansAPI\SharedTrialLinks;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Revoke the account's access to a shared Free Trial Link. Calls OnlyFans `DELETE /trials/share-access`, then removes the local cache row. The owner keeps the link.
 *
 * @see OnlyFansAPI\Services\SharedTrialLinksService::revokeAccess()
 *
 * @phpstan-type SharedTrialLinkRevokeAccessParamsShape = array{account: string}
 */
final class SharedTrialLinkRevokeAccessParams implements BaseModel
{
    /** @use SdkModel<SharedTrialLinkRevokeAccessParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new SharedTrialLinkRevokeAccessParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SharedTrialLinkRevokeAccessParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SharedTrialLinkRevokeAccessParams)->withAccount(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
