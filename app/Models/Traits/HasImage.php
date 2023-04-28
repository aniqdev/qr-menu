<?php


namespace App\Models\Traits;
use Intervention\Image\ImageManagerStatic as Image;


trait HasImage
{
	public function setImage($request)
	{
        if ($file = $request->file('image')) {
            $companyId = auth()->user()->company_id;

            $filename = str($this->name)->slug();

            $extension = $file->getClientOriginalExtension();

            $dirname = $this->getTable();

            $filepath = $file->storeAs("companies/{$companyId}/{$dirname}/{$this->id}/", "original@{$filename}.{$extension}", 'public');

            // unlink(public_path($this->image));

            $image = Image::make($file)->resize(200, 200, function($constraint) {
		        $constraint->aspectRatio();
		        $constraint->upsize();
		    })->save(storage_path("app/public/companies/{$companyId}/{$dirname}/{$this->id}/200@" . $filename . '-d.' . $extension));

            $image = Image::make($file)->resize(500, 500, function($constraint) {
		        $constraint->aspectRatio();
		        $constraint->upsize();
		    })->save(storage_path("app/public/companies/{$companyId}/{$dirname}/{$this->id}/500@" . $filename . '-d.' . $extension));

            $image = Image::make($file)->resize(1000, 1000, function($constraint) {
		        $constraint->aspectRatio();
		        $constraint->upsize();
		    })->save(storage_path("app/public/companies/{$companyId}/{$dirname}/{$this->id}/1000@" . $filename . '-d.' . $extension));

            return $this->image = '/storage/' . $filepath. '?v=' . time();
        }

        return $this->image;
	}
}