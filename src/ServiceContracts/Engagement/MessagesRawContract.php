<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Engagement;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Engagement\Messages\MessageGetMessageBuyersParams;
use OnlyFansAPI\Engagement\Messages\MessageGetMessageBuyersResponse;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageParams;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param string $messageID path param: The ID of the message
     * @param array<string,mixed>|MessageGetMessageBuyersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageGetMessageBuyersResponse>
     *
     * @throws APIException
     */
    public function getMessageBuyers(
        string $messageID,
        array|MessageGetMessageBuyersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|MessageGetTopMessageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageGetTopMessageResponse>
     *
     * @throws APIException
     */
    public function getTopMessage(
        string $account,
        array|MessageGetTopMessageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
