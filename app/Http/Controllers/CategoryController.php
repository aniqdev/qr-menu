<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('company_id', auth()->user()->company_id)->orderBy('sorting')->paginate(6);

        return view('back.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $data['company_id'] = auth()->user()->company_id;

        $category = Category::create($data);

        return [
            'request' => $request->all(),
            'category' => $category,
            'redirect' => route('categories.edit', $category),
            'message' => 'Success',
            // 'user' => auth()->user(),
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('back.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $companyId = auth()->user()->company_id;

        $file = $request->file('image');

        if ($file) {
            $companyId = auth()->user()->company_id;

            $filename = str($category->name)->slug();

            $extension = $file->getClientOriginalExtension();

            $filepath = $file->storeAs("companies/{$companyId}/categories/{$category->id}", $filename . '.' . $extension, 'public');

            // unlink(public_path($category->image));

            $data['image'] = '/storage/' . $filepath;

            $thumb_300 = createThumbs(public_path($data['image']), 'thumb-300', 300);
            $thumb_500 = createThumbs(public_path($data['image']), 'thumb-500', 500);
        }

        $category->update($data);

        return [
            'request' => $request->all(),
            'message' => 'Success',
            '$filename1' => $filename1 ?? null,
            '$filename2' => $filename2 ?? null,
            '$thumb_300' => $thumb_300 ?? null,
            '$thumb_500' => $thumb_500 ?? null,
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

function createThumbs( $pathToImage, $thumbDir = '/thumb/', $thumbWidth ) 
{
    $thumbDir = '/'.trim($thumbDir, '/').'/';
    // parse path for the extension
    $info = pathinfo($pathToImage);
    // continue only if this is a JPEG image
    if ( strtolower($info['extension']) == 'jpg' ) 
    {
      // load image and get image size
      $img = imagecreatefromjpeg( $pathToImage );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      @mkdir($info['dirname'].$thumbDir);

      // save thumbnail into a file
      imagejpeg( $tmp_img, $info['dirname'].$thumbDir.$info['basename'], 90 );

      return $thumbDir.$info['basename'];
    }
}
// call createThumb function and pass to it as parameters the path 
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width. 
// We are assuming that the path will be a relative path working 
// both in the filesystem, and through the web for links


function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}