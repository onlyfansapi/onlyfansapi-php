<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\LinkTags\LinkTagListParams\Type;
use Onlyfansapi\LinkTags\LinkTagListResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
