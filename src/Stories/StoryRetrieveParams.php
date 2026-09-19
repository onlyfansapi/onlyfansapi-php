<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Retrieve details of a specific story by its ID.
 *
 * @see OnlyFansAPI\Services\StoriesService::retrieve()
 *
 * @phpstan-type StoryRetrieveParamsShape = array{account: string}
 */
final class StoryRetrieveParams implements BaseModel
{
    /** @use SdkModel<StoryRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new StoryRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StoryRetrieveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StoryRetrieveParams)->withAccount(...)
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
