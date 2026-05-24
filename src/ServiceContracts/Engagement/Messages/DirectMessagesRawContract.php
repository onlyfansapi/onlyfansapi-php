<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Engagement\Messages;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartParams;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageListParams;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageListResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
