<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\LinkTags\LinkTagListParams\Type;
use OnlyFansAPI\LinkTags\LinkTagListResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface LinkTagsContract
{
    /**
     * @api
     *
     * @param Type|value-of<Type> $type Filter by link type. If not provided, returns tags for both types.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null
    ): LinkTagListResponse;
}
