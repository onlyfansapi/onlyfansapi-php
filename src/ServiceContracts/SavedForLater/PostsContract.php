<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\SavedForLater;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Posts\PostListResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface PostsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit Maximum number of posts to return (default = 10)
     * @param int $offset Offset for pagination (default = 0)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        int $limit,
        int $offset,
        RequestOptions|array|null $requestOptions = null,
    ): PostListResponse;
}
