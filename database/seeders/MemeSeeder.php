<?php

namespace Database\Seeders;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->pluck('id')->toArray();
        // 20 random images url in array
        $cleanmemes = [
            'https://static01.nyt.com/images/2022/01/31/crosswords/31meme-wordplay/31meme-wordplay-mediumSquareAt3X.png',
            'https://www.yourtango.com/sites/default/files/styles/body_image_default/public/2020/sarcastic-memes-me-clicking.png',
            'https://www.lifewire.com/thmb/NuvIVjOpUOdtA79xvZyQgisxcYc=/400x0/filters:no_upscale():max_bytes(150000):strip_icc()/Goalfor2020FunnyMeme-04eadff55a17489a85453238481fe36e.jpg',
            'https://www.todaysparent.com/wp-content/uploads/2017/06/when-your-kid-becomes-a-meme.jpg',
            'https://thumbor.bigedition.com/suspicious-child-meme/X6IpP-_Yi2dD4iqVWv-Ox7_slpk=/544x0/filters:quality(80)/granite-web-prod/6e/e7/6ee71190af814e7c8d0cae7d7cf8dbd6.jpeg',
            'https://englishonline.britishcouncil.org/wp-content/uploads/2021/11/image2-drake-posting-meme.jpg',
            'https://englishonline.britishcouncil.org/wp-content/uploads/2021/11/image1-drake-posting-meme.jpg',
            'https://i.imgflip.com/22ekih.jpg',
            'https://www.lifewire.com/thmb/JEZAzpDlpE9O35J6f_tr0mqUGqI=/400x0/filters:no_upscale():max_bytes(150000):strip_icc()/Middlesiblingmeme-9bf006e0ed944937b8c6516d05646aad.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_P3q1mjtGlugjKhCl52roZH_03ylQUFLBRtukzbKwqFfm2OXMK98g_GJVVL2PBPH4Kr4&usqp=CAU',
            'https://www.lboro.ac.uk/media/wwwlboroacuk/external/content/mediacentre/pressreleases/2018/10/maxresdefault.jpg',
            'https://media-assets-03.thedrum.com/cache/images/thedrum-prod/s3-news-tmp-349138-meme7--default--1050.png',
            'https://99designs-blog.imgix.net/blog/wp-content/uploads/2020/03/08d-e1584548693859.jpg?auto=format&q=60&fit=max&w=930',
            'https://splash247.com/wp-content/uploads/2021/03/Nike-1-631x1024.jpg',
            'https://englishonline.britishcouncil.org/wp-content/uploads/2022/02/image3-35-366x450.jpeg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyI-91Bph8tFFTSKp_8wzzwG9146heknSM_6Sf5_l0ddQsy40B5XzwChQSxlugYBhxSkw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUxY6T6JMZDqJalQaUbMSuFBj0FSDwcf13dA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeTkaqOP9yJFZ1K8SxCgecggVo9XlKalTTDQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK1urFml5IKX9A_02-wVFmtQpyR4MEbpfiYwVcnmVrv8-ZJGaXaM3Fo1_WaF4Hkn1g7GQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKc1Nvc42ANHHEFfeG2JVxnSpm4gYFWUyHCNAXEGg2IELgc4WuDiyqGClCk4Sq002l01s&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREqX6m9MBesbfWOT6ibDL_D7o80ebmB6V0NQ&usqp=CAU'

        ];

        // 20 random images url in array
        $darkmemes = [
            'https://filmdaily.co/wp-content/uploads/2020/05/darkhumor-01.jpg',
            'https://i.pinimg.com/1200x/d6/cb/00/d6cb008bc1291154467fd223ec8df556.jpg',
            'https://pbs.twimg.com/media/E7OkPlLXsAEROb-.jpg',
            'https://memesfeel.com/wp-content/uploads/2019/10/Dark-Memes-5.jpg',
            'https://i.pinimg.com/736x/f0/0b/25/f00b25f49e6e5293dae8f1c89d6340ea.jpg',
            'https://wompampsupport.azureedge.net/fetchimage?siteId=7682&v=2&jpgQuality=100&width=700&url=https%3A%2F%2Fcdn.ebaumsworld.com%2FmediaFiles%2Fpicture%2F2196124%2F85294380.jpg',
            'https://memesfeel.com/wp-content/uploads/2019/10/Dark-Memes-27.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBsJChcq2XKXDN3oY7LpZVTRNIAu_7G1stYw&usqp=CAU',
            'https://i.imgflip.com/557y6h.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHYZftalLImx_Yr1r4NTx1BbJ7i7rRqA30jw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_jjidcyTW-XpYDExMoGXO4hdINBMQgB4UKQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT31FPDXz486-BtAuCVc7lRgdW9g2nVUM3BMw&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT668QiOcER5O47DdofdzSkLCKMKxbgDFas1g&usqp=CAU',
            'https://pbs.twimg.com/media/DUKli9jU0AA72EL.jpg',
            'https://im.indiatimes.in/media/content/2018/Feb/dark_humor_1518765789.jpg',
            'https://i.pinimg.com/236x/7f/e8/1e/7fe81ece62ce38d82edb003d508a8282.jpg',
            'http://images3.memedroid.com/images/UPLOADED107/6082b7f65f66d.jpeg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShG2dTG9BjAjPJivDpaCU_yYcgkLOCx3RHrtdsUbnLb5H_DfR0kIfzP6O10DNE_rq2vfU&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMSox3CiWjUl3FhLhADc32BCB3M3fy8E7nkQ&usqp=CAU',
            'https://cdn.ebaumsworld.com/2020/10/23/013439/86423772/drops-a-pin-grenade-shop.jpg',
        ];

        foreach ($cleanmemes as $clean){
            Meme::create([
                'meme_url' => $clean,
                'type' => 'clean',
                'user_id' => $users[rand(0, count($users) - 1)],
            ]);
        }

        foreach ($darkmemes as $dark){
            Meme::create([
                'meme_url' => $dark,
                'type' => 'dark',
                'user_id' => $users[rand(0, count($users) - 1)],

            ]);
        }
    }
}
