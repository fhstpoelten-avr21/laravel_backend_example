<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

/**
 * Class ApiDocsController
 *
 * @package App\Http\Controllers
 */
class ApiDocsController extends BaseController
{
    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function yml()
    {
        return response()->download(base_path('docs/api-docs.yml'));
    }
}
