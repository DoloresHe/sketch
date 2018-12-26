<?php

namespace App\Http\Resources\BookResources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AuthorIdentifierResource;
use Auth;
class BookRelationshipResource extends JsonResource
{
    /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function toArray($request)
    {
        if ((!$this->is_anonymous)||(Auth::guard('api')->check()&&((Auth::guard('api')->user()->is_admin)||(Auth::guard('api')->id()===$this->user_id)))){
            $author = new AuthorIdentifierResource($this->author);
        }else{
            $author = [];
        }
        return [
            'author'         =>  $author,
            'channel'        => [
                'type'              => 'channel',
                'id'                => $this->channel_id,
                'attributes'        => $this->simpleChannel(),
            ],
            'label'        => [
                'type'              => 'label',
                'id'                => $this->label_id,
                'attributes'        => $this->simpleLabel(),
            ],
            'tags'          => (new BookTagsRelationshipResource($this->tags))->additional(['thread' => $this]),
        ];
    }
}
