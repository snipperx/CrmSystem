<?php


namespace App\Traits;
use Illuminate\Http\Request;

trait storeImageTrait
{

        public function verifyAndStoreImage(Request $request, $fieldname , $directory  ,$moduleName )
        {
            if ($request->hasFile($fieldname)) {
                $image_name = $request->file($fieldname);
                $image_ext = $image_name->extension();
                if (in_array($image_ext, ['jpg', 'png', 'jpeg']) &&
                    $image_name->isValid()) {
                    $filename = pathinfo($image_name->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileNameToStore = $filename . '-' . time() . '.' . $image_ext;
                    $path = $image_name->storeAs('public'.'/'.$directory, $fileNameToStore);
                    $moduleName->$fieldname = $fileNameToStore;
                 return   $moduleName->update();
                }
            }
            return null;
        }

}
