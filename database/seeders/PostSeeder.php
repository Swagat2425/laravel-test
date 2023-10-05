<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $now_date = date('Y-m-d H:i:s');

        $post = new Post();
        $post->title = 'My First Personal Blog';
        $post->content = '<p>&nbsp;Curabitur venenatis urna eget odio rhoncus, eu commodo nisi vestibulum. Aenean id sem iaculis, iaculis metus consectetur, tempus est. Sed non hendrerit orci. Sed quis diam a tortor mollis vestibulum. In tristique, nibh id vulputate dapibus, ligula massa blandit nunc, eget varius risus mi euismod quam. Donec ligula lectus, feugiat id dapibus nec, venenatis quis odio. Duis tellus arcu, posuere vitae erat vel, molestie ullamcorper quam. Nulla porttitor viverra nisl et viverra. Vestibulum bibendum felis eget ex pellentesque, bibendum consequat ex pulvinar. Duis tincidunt felis id risus eleifend, sed dictum quam molestie. Integer ultricies ullamcorper arcu vel bibendum.</p>
        <p>Donec massa lacus, consequat at tincidunt vel, molestie at nibh. Maecenas vel felis consectetur, maximus libero eget, interdum mauris. Quisque erat sem, tempor sit amet faucibus non, venenatis non augue. Curabitur ut dictum massa. Nullam commodo neque ac nisi malesuada rhoncus. Sed euismod eu magna ac aliquam. Nulla facilisi. Phasellus convallis molestie tellus, dignissim ornare dui facilisis quis. Praesent id consectetur est. Maecenas felis eros, aliquet id nulla quis, bibendum consectetur orci. Quisque eget malesuada massa. Aenean auctor tempus diam, et vehicula neque sodales quis.</p>
        <p>&nbsp;</p>
        <p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aHVtYW58ZW58MHx8MHx8fDA%3D&amp;w=1000&amp;q=80" alt="" width="450" height="563"></p>
        <p>&nbsp;</p>
        <p>Morbi sed fermentum sem, ac semper enim. Nullam ornare finibus libero pulvinar elementum. Fusce convallis dignissim lectus id consequat. Sed magna massa, luctus nec ex maximus, pellentesque dictum mauris. Fusce eu pellentesque ligula. Nunc eu tellus auctor, varius enim vitae, laoreet enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam ultricies placerat varius. Quisque sodales nisl quis orci lacinia, ut rhoncus velit vestibulum. Proin sit amet cursus tellus. Ut pellentesque lobortis massa. Suspendisse velit dui, pellentesque non ex vitae, euismod placerat metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed lacus est, iaculis at placerat ac, bibendum ut quam.&nbsp;</p>';
        $post->image = '';
        $post->cat_id = 1;
        $post->status = 1;
        $post->crt_on = $now_date;
        $post->updt_on = $now_date;
        $post->crt_by = 1;
        $post->updt_by = 1;
        $post->save();

        $post2 = new Post();
        $post2->title = 'My First Food Blog';
        $post2->content = '<p>&nbsp;</p>
        <p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://cdn.britannica.com/36/123536-050-95CB0C6E/Variety-fruits-vegetables.jpg" alt="" width="450" height="563"></p>
        <p>&nbsp;</p>
        <p>Morbi sed fermentum sem, ac semper enim. Nullam ornare finibus libero pulvinar elementum. Fusce convallis dignissim lectus id consequat. Sed magna massa, luctus nec ex maximus, pellentesque dictum mauris. Fusce eu pellentesque ligula. Nunc eu tellus auctor, varius enim vitae, laoreet enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam ultricies placerat varius. Quisque sodales nisl quis orci lacinia, ut rhoncus velit vestibulum. Proin sit amet cursus tellus. Ut pellentesque lobortis massa. Suspendisse velit dui, pellentesque non ex vitae, euismod placerat metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed lacus est, iaculis at placerat ac, bibendum ut quam.&nbsp;</p>';
        $post2->image = '';
        $post2->cat_id = 2;
        $post2->status = 1;
        $post2->crt_on = $now_date;
        $post2->updt_on = $now_date;
        $post2->crt_by = 1;
        $post2->updt_by = 1;
        $post2->save();

        $post3 = new Post();
        $post3->title = 'My First Travel Blog';
        $post3->content = '<p>&nbsp;Curabitur venenatis urna eget odio rhoncus, eu commodo nisi vestibulum. Aenean id sem iaculis, iaculis metus consectetur, tempus est. Sed non hendrerit orci. Sed quis diam a tortor mollis vestibulum. In tristique, nibh id vulputate dapibus, ligula massa blandit nunc, eget varius risus mi euismod quam. Donec ligula lectus, feugiat id dapibus nec, venenatis quis odio. Duis tellus arcu, posuere vitae erat vel, molestie ullamcorper quam. Nulla porttitor viverra nisl et viverra. Vestibulum bibendum felis eget ex pellentesque, bibendum consequat ex pulvinar. Duis tincidunt felis id risus eleifend, sed dictum quam molestie. Integer ultricies ullamcorper arcu vel bibendum.</p>
        <p>&nbsp;</p>
        <p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://media.istockphoto.com/id/1285301614/photo/young-man-arms-outstretched-by-the-sea-at-sunrise-enjoying-freedom-and-life-people-travel.jpg?s=612x612&w=0&k=20&c=0QW6GnkuFNYcPZhy26XVHuTc2avJTK8u6l_1iT0SlZk=" alt="" width="450" height="563"></p>
        <p>&nbsp;</p>
        <p>Morbi sed fermentum sem, ac semper enim. Nullam ornare finibus libero pulvinar elementum. Fusce convallis dignissim lectus id consequat. Sed magna massa, luctus nec ex maximus, pellentesque dictum mauris. Fusce eu pellentesque ligula. Nunc eu tellus auctor, varius enim vitae, laoreet enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam ultricies placerat varius. Quisque sodales nisl quis orci lacinia, ut rhoncus velit vestibulum. Proin sit amet cursus tellus. Ut pellentesque lobortis massa. Suspendisse velit dui, pellentesque non ex vitae, euismod placerat metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed lacus est, iaculis at placerat ac, bibendum ut quam.&nbsp;</p>';
        $post3->image = '';
        $post3->cat_id = 3;
        $post3->status = 1;
        $post3->crt_on = $now_date;
        $post3->updt_on = $now_date;
        $post3->crt_by = 1;
        $post3->updt_by = 1;
        $post3->save();
      
    }
}
