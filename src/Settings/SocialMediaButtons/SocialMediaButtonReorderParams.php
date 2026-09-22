<?php

declare(strict_types=1);

namespace OnlyFansAPI\Settings\SocialMediaButtons;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Changes the order of social media buttons for the account.
 *
 * @see OnlyFansAPI\Services\Settings\SocialMediaButtonsService::reorder()
 *
 * @phpstan-type SocialMediaButtonReorderParamsShape = array{
 *   buttonIDs: list<string>
 * }
 */
final class SocialMediaButtonReorderParams implements BaseModel
{
    /** @use SdkModel<SocialMediaButtonReorderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The new order of the buttons.
     *
     * @var list<string> $buttonIDs
     */
    #[Required('button_ids', list: 'string')]
    public array $buttonIDs;

    /**
     * `new SocialMediaButtonReorderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SocialMediaButtonReorderParams::with(buttonIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SocialMediaButtonReorderParams)->withButtonIDs(...)
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
     *
     * @param list<string> $buttonIDs
     */
    public static function with(array $buttonIDs): self
    {
        $self = new self;

        $self['buttonIDs'] = $buttonIDs;

        return $self;
    }

    /**
     * The new order of the buttons.
     *
     * @param list<string> $buttonIDs
     */
    public function withButtonIDs(array $buttonIDs): self
    {
        $self = clone $this;
        $self['buttonIDs'] = $buttonIDs;

        return $self;
    }
}
