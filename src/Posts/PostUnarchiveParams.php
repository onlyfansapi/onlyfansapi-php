<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Unarchive a post from your account.
 *
 * @see Onlyfansapi\Services\PostsService::unarchive()
 *
 * @phpstan-type PostUnarchiveParamsShape = array{
 *   account: string, privateArchive?: bool|null
 * }
 */
final class PostUnarchiveParams implements BaseModel
{
    /** @use SdkModel<PostUnarchiveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Set to `true` if this post is currently in the Private Archive.
     */
    #[Optional]
    public ?bool $privateArchive;

    /**
     * `new PostUnarchiveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostUnarchiveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostUnarchiveParams)->withAccount(...)
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
    public static function with(
        string $account,
        ?bool $privateArchive = null
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $privateArchive && $self['privateArchive'] = $privateArchive;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Set to `true` if this post is currently in the Private Archive.
     */
    public function withPrivateArchive(bool $privateArchive): self
    {
        $self = clone $this;
        $self['privateArchive'] = $privateArchive;

        return $self;
    }
}
