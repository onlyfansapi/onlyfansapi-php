<?php

declare(strict_types=1);

namespace Onlyfansapi\SharedTrackingLinks\Tags;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get tags for a specific shared Tracking Link. Tag namespace is shared with owned Tracking Links. This is a free endpoint.
 *
 * @see Onlyfansapi\Services\SharedTrackingLinks\TagsService::list()
 *
 * @phpstan-type TagListParamsShape = array{account: string}
 */
final class TagListParams implements BaseModel
{
    /** @use SdkModel<TagListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new TagListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TagListParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TagListParams)->withAccount(...)
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
