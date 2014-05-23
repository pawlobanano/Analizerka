<?php

class ImageController extends BaseController
{
    /**
     * Remove the specified image from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        $uploadsPath = public_path() . '/uploads/';
        $fileName    = $image->name;
        $folderName  = $image->folder_name;
        $folder      = $uploadsPath . $folderName;
        $file        = $uploadsPath . $folderName . '/' . $fileName;

        File::delete($file);
        File::deleteDirectory($folder);

        if (File::exists($file)) {
            Session::flash('error', 'Something went wrong with deleting your image!');

            return Redirect::back();
        }

        // Actual database entity deletion
        $image->delete();

        Session::flash('success', 'Successfully deleted the image!');

        return Redirect::back();
    }
}
