<?php

namespace App\Observers;

use App\Blog;

class BlogObserver
{
    /**
     * Handle the blog "created" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function created(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "updated" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function updated(Blog $blog)
    {
        if(request()->is_video != 1){
            if(request()->img){
                if($blog->getOriginal('img')){
                    if(file_exists('uploads/blogs/' . $blog->getOriginal('img'))) {
                        unlink('uploads/blogs/' . $blog->getOriginal('img'));
                    }
                }
		    }
		}else {
            if($blog->getOriginal('img')){
                if(file_exists('uploads/blogs/' . $blog->getOriginal('img'))) {
                    unlink('uploads/blogs/' . $blog->getOriginal('img'));
                }
            }
        }
    }

    /**
     * Handle the blog "deleted" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        if($blog->img){
			if(file_exists('uploads/blogs/' . $blog->img)) {
				unlink('uploads/blogs/' . $blog->img);
			}
		}
    }

    /**
     * Handle the blog "restored" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function restored(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "force deleted" event.
     *
     * @param  \App\Blog  $blog
     * @return void
     */
    public function forceDeleted(Blog $blog)
    {
        //
    }
}
