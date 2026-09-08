<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Engagement\Messages;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartParams;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageChartResponse;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageListParams;
use OnlyFansAPI\Engagement\Messages\DirectMessages\DirectMessageListResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface DirectMessagesRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|DirectMessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirectMessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|DirectMessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|DirectMessageChartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirectMessageChartResponse>
     *
     * @throws APIException
     */
    public function chart(
        string $account,
        array|DirectMessageChartParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
