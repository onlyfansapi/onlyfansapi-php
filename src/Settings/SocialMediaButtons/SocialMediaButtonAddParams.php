<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SocialMediaButtons;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Settings\SocialMediaButtons\SocialMediaButtonAddParams\Type;

/**
 * Adds a new social media button to the account.
 *
 * @see Onlyfansapi\Services\Settings\SocialMediaButtonsService::add()
 *
 * @phpstan-type SocialMediaButtonAddParamsShape = array{
 *   label: string, type: Type|value-of<Type>, value: string
 * }
 */
final class SocialMediaButtonAddParams implements BaseModel
{
    /** @use SdkModel<SocialMediaButtonAddParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The button label.
     */
    #[Required]
    public string $label;

    /**
     * The button type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The button value, either a username or link.
     */
    #[Required]
    public string $value;

    /**
     * `new SocialMediaButtonAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SocialMediaButtonAddParams::with(label: ..., type: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SocialMediaButtonAddParams)->withLabel(...)->withType(...)->withValue(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $label,
        Type|string $type,
        string $value
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['type'] = $type;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The button label.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The button type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The button value, either a username or link.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
