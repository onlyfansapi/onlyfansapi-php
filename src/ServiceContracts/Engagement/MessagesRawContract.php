<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Engagement;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Engagement\Messages\MessageGetMessageBuyersParams;
use Onlyfansapi\Engagement\Messages\MessageGetMessageBuyersResponse;
use Onlyfansapi\Engagement\Messages\MessageGetTopMessageParams;
use Onlyfansapi\Engagement\Messages\MessageGetTopMessageResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
