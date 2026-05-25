<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Messages\MessageAttachTagsParams;
use OnlyFansAPI\Messages\MessageAttachTagsResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param string $messageID Path param: The ID of the message to attach the release forms to. This can be ONLY a message sent by the creator.
     * @param array<string,mixed>|MessageAttachTagsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageAttachTagsResponse>
     *
     * @throws APIException
     */
    public function attachTags(
        string $messageID,
        array|MessageAttachTagsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
