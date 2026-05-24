<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SavedForLater;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Messages\MessageListResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MessagesContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit Maximum number of messages to return (default = 10)
     * @param int $offset Offset for pagination (default = 0)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        int $limit,
        int $offset,
        RequestOptions|array|null $requestOptions = null,
    ): MessageListResponse;
}
