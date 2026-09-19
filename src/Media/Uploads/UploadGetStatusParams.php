<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Uploads;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Check the status of a media upload. Poll this endpoint until status is `completed` or `failed`. This endpoint is free and does not cost any credits.
 *
 * **Possible statuses:**
 * - `pending` — Upload is queued
 * - `processing` — Download/upload in progress
 * - `completed` — Upload finished, `media` and `credits_used` are included
 * - `failed` — Upload failed, `error` is included
 *
 * Instead of polling, you can subscribe to the `media_uploads.completed` and `media_uploads.failed` webhook events. They carry the same fields as this endpoint and are only sent for async (`async=true`) uploads — synchronous uploads return their result directly.
 *
 * @see OnlyFansAPI\Services\Media\UploadsService::getStatus()
 *
 * @phpstan-type UploadGetStatusParamsShape = array{account: string}
 */
final class UploadGetStatusParams implements BaseModel
{
    /** @use SdkModel<UploadGetStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new UploadGetStatusParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UploadGetStatusParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UploadGetStatusParams)->withAccount(...)
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
