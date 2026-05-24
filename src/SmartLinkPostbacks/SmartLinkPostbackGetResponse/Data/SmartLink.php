<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinkPostbacks\SmartLinkPostbackGetResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type SmartLinkShape = array{
 *   accountDisplayName?: string|null,
 *   accountPrefixedID?: string|null,
 *   linkUlid?: string|null,
 *   name?: string|null,
 * }
 */
final class SmartLink implements BaseModel
{
    /** @use SdkModel<SmartLinkShape> */
    use SdkModel;

    #[Optional('account_display_name')]
    public ?string $accountDisplayName;

    #[Optional('account_prefixed_id')]
    public ?string $accountPrefixedID;

    #[Optional('link_ulid')]
    public ?string $linkUlid;

    #[Optional]
    public ?string $name;

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
        ?string $accountDisplayName = null,
        ?string $accountPrefixedID = null,
        ?string $linkUlid = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $accountDisplayName && $self['accountDisplayName'] = $accountDisplayName;
        null !== $accountPrefixedID && $self['accountPrefixedID'] = $accountPrefixedID;
        null !== $linkUlid && $self['linkUlid'] = $linkUlid;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withAccountDisplayName(string $accountDisplayName): self
    {
        $self = clone $this;
        $self['accountDisplayName'] = $accountDisplayName;

        return $self;
    }

    public function withAccountPrefixedID(string $accountPrefixedID): self
    {
        $self = clone $this;
        $self['accountPrefixedID'] = $accountPrefixedID;

        return $self;
    }

    public function withLinkUlid(string $linkUlid): self
    {
        $self = clone $this;
        $self['linkUlid'] = $linkUlid;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
