<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Media;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember4;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
    ): UnionMember0|UnionMember1|UnionMember2|UnionMember3|UnionMember4;
}
