<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Engagement\Messages;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartParams;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageChartResponse;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageListParams;
use Onlyfansapi\Engagement\Messages\MassMessages\MassMessageListResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
