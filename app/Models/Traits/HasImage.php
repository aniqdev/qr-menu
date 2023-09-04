<?php


namespace App\Models\Traits;
use Intervention\Image\ImageManagerStatic as Image;


trait HasImage
{
	public function getImageSmallAttribute()
	{
		if (!$this->attributes['image']) {
			return '/images/img-placeholder.png';
		}

		return str_replace('/original@', '/200@', $this->attributes['image']);
	}

	public function getImageMediumAttribute()
	{
		if (!$this->attributes['image']) {
			return '/images/img-placeholder.png';
		}

		return str_replace('/original@', '/500@', $this->attributes['image']);
	}

	public function getImageBigAttribute()
	{
		if (!$this->attributes['image']) {
			return '/images/img-placeholder.png';
		}

		return str_replace('/original@', '/1000@', $this->attributes['image']);
	}

	public function getImageAttribute()
	{
		if (!$this->attributes['image']) {
			return '/images/img-placeholder.png';
		}

		return str_replace('/original@', '/1000@', $this->attributes['image']);
	}

	public function setImage($request)
	{
		if ($request->remove_image) {
			$this->image = null;
			// here delete image files
		}

		if ($file = $request->file('image')) {

			if (!$this->id || !$this->name) {
				throw new Exception("Item id is required");
			}

			$companyId = auth()->user()->company_id;

			$filename = str($this->name)->slug();

			$extension = $file->getClientOriginalExtension();

			$dirname = $this->getTable();

			if ($saveOriginal = false) {
				$filepath = $file->storeAs("companies/{$companyId}/{$dirname}/{$this->id}/", "original@{$filename}.{$extension}", 'public');
			}else{
				@mkdir(storage_path("app/public/companies/{$companyId}/{$dirname}/{$this->id}/"));
				$filepath = "companies/{$companyId}/{$dirname}/{$this->id}/original@{$filename}.{$extension}";
			}

			// unlink(public_path($this->image));

			$image = Image::make($file)->resize(200, 200, function($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			})->save(storage_path("app/public/companies/{$companyId}/{$dirname}/{$this->id}/200@" . $filename . '.' . $extension));

			$image = Image::make($file)->resize(500, 500, function($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			})->save(storage_path("app/public/companies/{$companyId}/{$dirname}/{$this->id}/500@" . $filename . '.' . $extension));

			$image = Image::make($file)->resize(1000, 1000, function($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize();
			})->save(storage_path("app/public/companies/{$companyId}/{$dirname}/{$this->id}/1000@" . $filename . '.' . $extension));

			return $this->image = '/storage/' . $filepath. '?v=' . time();
		}

		return $this->image;
	}
}