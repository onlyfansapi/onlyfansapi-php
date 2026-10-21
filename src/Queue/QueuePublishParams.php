<?php

declare(strict_types=1);

namespace OnlyFansAPI\Queue;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Publish a queue item or "saved for later" item (post or mass message). This means that the item will be sent immediately, regardless of its scheduled date.
 *
 * @see OnlyFansAPI\Services\QueueService::publish()
 *
 * @phpstan-type QueuePublishParamsShape = array{account: string}
 */
final class QueuePublishParams implements BaseModel
{
    /** @use SdkModel<QueuePublishParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new QueuePublishParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueuePublishParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueuePublishParams)->withAccount(...)
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
