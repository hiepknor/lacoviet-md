<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {

    }

    public function upload(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');
//                // set destination path
//                $folderDir = 'public/uploads/products';
//                $destinationPath = base_path() . '/' . $folderDir;
//                // this form uploads multiple files
//                foreach ($request->file('file') as $fileKey => $fileObject ) {
//                    // make sure each file is valid
//                    if ($fileObject->isValid()) {
//                        // make destination file name
//                        $destinationFileName = time() . $fileObject->getClientOriginalName();
//                        // move the file from tmp to the destination path
//                        $fileObject->move($destinationPath, $destinationFileName);
//                    }
//                }
                return response($imageFiles);
            }
        }
    }
}
