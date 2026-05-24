<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Chats;

use Onlyfansapi\Chats\MarkAsRead\MarkAsReadAllResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MarkAsReadContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function all(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): MarkAsReadAllResponse;
}
