<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Media;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface UploadsContract
{
    /**
     * @api
     *
     * @param string $upload the prefixed ID of the upload
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        string $upload,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UnionMember0|UnionMember1|UnionMember2|UnionMember3;
}
