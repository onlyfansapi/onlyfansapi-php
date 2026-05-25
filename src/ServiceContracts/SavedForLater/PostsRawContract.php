<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SavedForLater;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Posts\PostListParams;
use OnlyFansAPI\SavedForLater\Posts\PostListResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface PostsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PostListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PostListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|PostListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
