<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\LinkTags\LinkTagListParams;
use OnlyFansAPI\LinkTags\LinkTagListResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface LinkTagsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|LinkTagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LinkTagListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|LinkTagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
