<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Delete a Tracking Link.
 *
 * @see Onlyfansapi\Services\TrackingLinksService::delete()
 *
 * @phpstan-type TrackingLinkDeleteParamsShape = array{account: string}
 */
final class TrackingLinkDeleteParams implements BaseModel
{
    /** @use SdkModel<TrackingLinkDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new TrackingLinkDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackingLinkDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackingLinkDeleteParams)->withAccount(...)
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
