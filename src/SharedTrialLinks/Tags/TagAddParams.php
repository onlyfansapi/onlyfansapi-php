<?php

declare(strict_types=1);

namespace OnlyFansAPI\SharedTrialLinks\Tags;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Add tags to a shared Free Trial Link. Existing tags are preserved. Tag namespace is shared with owned Free Trial Links. This is a free endpoint.
 *
 * @see OnlyFansAPI\Services\SharedTrialLinks\TagsService::add()
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
     * Array of tag names to add to the shared trial link.
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
     * Array of tag names to add to the shared trial link.
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
