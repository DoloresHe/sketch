<!-- 简单展示一串帖子 -->
@foreach($activities as $key=>$activity)
@if($activity->item)
<?php $post=$activity->item; ?>
@include('posts._simple_post')
@endif
@endforeach
