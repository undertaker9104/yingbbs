<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {
        //xss過濾
        $topic->body = clean($topic->body, 'user_topic_body');

        //生成話題摘錄
        $topic->excerpt = make_excerpt($topic->body);
    }

    public function saved(Topic $topic)
    {
        //如果slug無內容,就用翻譯器對title翻譯
        if(!$topic->slug) {
            //推送任務到queue
            dispatch(new TranslateSlug($topic));
        }
    }
}