<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function upload($file, $path, $category = null)
    {


        $fullPath = $file->store($path);

        $this->fill([
            'path'              => $fullPath,
            'category'          => $category,
            'original_name'     => $file->getClientOriginalName(),
            'mime_type'         => $file->getMimeType(),
            'size'              => $file->getSize(),
            'extension'         => $file->getClientOriginalExtension(),
        ])->save();

        return $this;
    }

    public function fileable()
    {
        return $this->morphTo();
    }
}
