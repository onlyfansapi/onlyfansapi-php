<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Pin or unpin a post to your account.
 *
 * @see OnlyFansAPI\Services\PostsService::pin()
 *
 * @phpstan-type PostPinParamsShape = array{account: string}
 */
final class PostPinParams implements BaseModel
{
    /** @use SdkModel<PostPinParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new PostPinParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostPinParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostPinParams)->withAccount(...)
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
