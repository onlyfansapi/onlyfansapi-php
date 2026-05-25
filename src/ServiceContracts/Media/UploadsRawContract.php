<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Media;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Uploads\UploadGetStatusParams;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface UploadsRawContract
{
    /**
     * @api
     *
     * @param string $upload the prefixed ID of the upload
     * @param array<string,mixed>|UploadGetStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1|UnionMember2|UnionMember3>
     *
     * @throws APIException
     */
    public function getStatus(
        string $upload,
        array|UploadGetStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
