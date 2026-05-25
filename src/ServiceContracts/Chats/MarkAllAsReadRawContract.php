<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Chats;

use OnlyFansAPI\Chats\MarkAllAsRead\MarkAllAsReadAllResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MarkAllAsReadRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarkAllAsReadAllResponse>
     *
     * @throws APIException
     */
    public function all(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
