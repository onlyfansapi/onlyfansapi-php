<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SavedForLater;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Messages\MessageListParams;
use OnlyFansAPI\SavedForLater\Messages\MessageListResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|MessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|MessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
