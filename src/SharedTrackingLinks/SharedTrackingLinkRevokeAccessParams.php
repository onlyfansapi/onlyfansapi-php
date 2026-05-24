<?php

declare(strict_types=1);

namespace Onlyfansapi\SharedTrackingLinks;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Revoke the account's access to a shared Tracking Link (campaign). Calls OnlyFans `DELETE /campaigns/share-access`, then removes the local cache row. The owner keeps the link.
 *
 * @see Onlyfansapi\Services\SharedTrackingLinksService::revokeAccess()
 *
 * @phpstan-type SharedTrackingLinkRevokeAccessParamsShape = array{account: string}
 */
final class SharedTrackingLinkRevokeAccessParams implements BaseModel
{
    /** @use SdkModel<SharedTrackingLinkRevokeAccessParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new SharedTrackingLinkRevokeAccessParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SharedTrackingLinkRevokeAccessParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SharedTrackingLinkRevokeAccessParams)->withAccount(...)
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
