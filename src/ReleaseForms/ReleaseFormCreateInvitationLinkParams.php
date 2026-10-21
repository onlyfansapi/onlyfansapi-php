<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Create a new invitation link for release forms.
 *
 * @see OnlyFansAPI\Services\ReleaseFormsService::createInvitationLink()
 *
 * @phpstan-type ReleaseFormCreateInvitationLinkParamsShape = array{name: string}
 */
final class ReleaseFormCreateInvitationLinkParams implements BaseModel
{
    /** @use SdkModel<ReleaseFormCreateInvitationLinkParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the invitation link.
     */
    #[Required]
    public string $name;

    /**
     * `new ReleaseFormCreateInvitationLinkParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReleaseFormCreateInvitationLinkParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReleaseFormCreateInvitationLinkParams)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * The name of the invitation link.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
