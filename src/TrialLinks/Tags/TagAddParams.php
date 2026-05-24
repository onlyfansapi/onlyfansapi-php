<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks\Tags;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Add tags to a specific free trial link. Existing tags are preserved. This is a free endpoint.
 *
 * @see Onlyfansapi\Services\TrialLinks\TagsService::add()
 *
 * @phpstan-type TagAddParamsShape = array{account: string, tags: list<string>}
 */
final class TagAddParams implements BaseModel
{
    /** @use SdkModel<TagAddParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Array of tag names to add to the trial link.
     *
     * @var list<string> $tags
     */
    #[Required(list: 'string')]
    public array $tags;

    /**
     * `new TagAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagAddParams::with(account: ..., tags: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagAddParams)->withAccount(...)->withTags(...)
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
     * @param list<string> $tags
     */
    public static function with(string $account, array $tags): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['tags'] = $tags;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Array of tag names to add to the trial link.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
