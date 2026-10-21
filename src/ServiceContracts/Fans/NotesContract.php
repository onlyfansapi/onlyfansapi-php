<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Fans;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Fans\Notes\NoteClearNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteGetNotesResponse;
use OnlyFansAPI\Fans\Notes\NoteNewEditNotesResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface NotesContract
{
    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clearNotes(
        string $fanID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): NoteClearNotesResponse;

    /**
     * @api
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param string $account Path param: The Account ID
     * @param string $notes body param: The new note value
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createEditNotes(
        string $fanID,
        string $account,
        string $notes,
        RequestOptions|array|null $requestOptions = null,
    ): NoteNewEditNotesResponse;

    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNotes(
        string $fanID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): NoteGetNotesResponse;
}
