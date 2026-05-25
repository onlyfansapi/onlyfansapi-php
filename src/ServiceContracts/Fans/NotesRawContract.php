<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Fans;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Fans\Notes\NoteClearNotesParams;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteCreateEditNotesParams;
use OnlyFansAPI\Fans\Notes\NoteGetNotesParams;
use OnlyFansAPI\Fans\Notes\NoteGetNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteNewEditNotesResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface NotesRawContract
{
    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array<string,mixed>|NoteClearNotesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NoteClearNotesResponse>
     *
     * @throws APIException
     */
    public function clearNotes(
        string $fanID,
        array|NoteClearNotesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param array<string,mixed>|NoteCreateEditNotesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NoteNewEditNotesResponse>
     *
     * @throws APIException
     */
    public function createEditNotes(
        string $fanID,
        array|NoteCreateEditNotesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array<string,mixed>|NoteGetNotesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NoteGetNotesResponse>
     *
     * @throws APIException
     */
    public function getNotes(
        string $fanID,
        array|NoteGetNotesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
