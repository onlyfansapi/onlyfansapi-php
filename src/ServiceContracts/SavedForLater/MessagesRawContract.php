<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SavedForLater;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SavedForLater\Messages\MessageListParams;
use Onlyfansapi\SavedForLater\Messages\MessageListResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
