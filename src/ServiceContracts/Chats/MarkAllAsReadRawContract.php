<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Chats;

use Onlyfansapi\Chats\MarkAllAsRead\MarkAllAsReadAllResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
