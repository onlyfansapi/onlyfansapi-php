<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Messages\MessageAttachTagsParams;
use Onlyfansapi\Messages\MessageAttachTagsResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
