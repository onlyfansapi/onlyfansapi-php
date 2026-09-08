<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Engagement\Messages;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageChartParams;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageChartResponse;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageListParams;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageListResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MassMessagesRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|MassMessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|MassMessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|MassMessageChartParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MassMessageChartResponse>
     *
     * @throws APIException
     */
    public function chart(
        string $account,
        array|MassMessageChartParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
