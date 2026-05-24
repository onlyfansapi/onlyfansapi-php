<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Posts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Posts\Labels\LabelCreateParams;
use Onlyfansapi\Posts\Labels\LabelListParams;
use Onlyfansapi\Posts\Labels\LabelListResponse;
use Onlyfansapi\Posts\Labels\LabelNewResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
