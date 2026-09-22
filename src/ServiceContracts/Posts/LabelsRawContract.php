<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Posts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Posts\Labels\LabelCreateParams;
use OnlyFansAPI\Posts\Labels\LabelListParams;
use OnlyFansAPI\Posts\Labels\LabelListResponse;
use OnlyFansAPI\Posts\Labels\LabelNewResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface LabelsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|LabelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|LabelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|LabelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|LabelListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
