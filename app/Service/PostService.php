<?php

namespace App\Service;

use Exception;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PostService {


    public function store($data) {
        try{
            DB::beginTransaction();
            $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);


            $tags = $data['tags'] ?? [];


            //   $post = Post::create(array_merge($request->validated(), ['status' => Status::CHANJED]));
              $post = Post::Create($data);
             if(!empty($tags)) {
                 $post->tags()->attach($tags);
             }
             DB::commit();
        } catch (Exception $exception) {
            abort('500');
            DB::rollback();
        }

    }

    public function update($data,$post) {

        try{

        DB::beginTransaction();

        if(isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
        }

        if(isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
        }

        $tags = $data['tags'] ?? [];
        $post->update($data);

        $post = $post->fresh();
        $post->tags()->sync($tags);

        DB::commit();

        } catch(Exception $exception) {
            abort('500');
            DB::rollback();
        }

    }
}
