<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\LinkTags\LinkTagListParams;
use Onlyfansapi\LinkTags\LinkTagListResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
