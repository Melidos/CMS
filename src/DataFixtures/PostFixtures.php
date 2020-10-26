<?php

namespace App\DataFixtures;

use App\Entity\Post;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $post = new Post();

        $post->setDate(new DateTime("NOW"));
        $post->setTitle("First Posts");
        $post->setText("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit molestie dui in ultricies. Aenean arcu urna, euismod eu tristique quis, tristique ultricies est. Nam auctor velit interdum mauris commodo molestie. Nam tristique gravida ullamcorper. Duis gravida tortor et aliquam placerat. Donec elementum, dui at accumsan fermentum, erat ex sagittis nunc, eget cursus diam dolor sed massa. Sed imperdiet lorem et sodales ullamcorper. Curabitur eu metus id neque commodo accumsan ac at dui. In eu nunc eu nulla blandit gravida non id orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent viverra vestibulum felis eu elementum. Mauris nunc neque, sodales sed nisi vitae, convallis eleifend magna. Vivamus malesuada, ante eu commodo gravida, leo neque hendrerit lorem, imperdiet aliquam arcu felis eget felis. Nunc vel magna consectetur, sollicitudin lorem eget, tempor ipsum. Aliquam interdum laoreet lacinia. Sed ullamcorper nibh id urna blandit, vitae euismod tellus tincidunt. Donec volutpat mattis eros, at ultricies nisi porta quis. In tincidunt pulvinar lorem, non pulvinar ipsum consequat a. Proin sodales lectus a purus venenatis laoreet. Sed nisi tortor, placerat eu commodo ac, fermentum eu tortor. Pellentesque porttitor libero nec odio volutpat vulputate. Donec hendrerit lacus sed nisl suscipit viverra nec eu dui. Duis ipsum justo, posuere in diam vel, iaculis euismod massa. Vestibulum pulvinar libero vestibulum nunc gravida tincidunt. Aliquam sed felis sed neque eleifend auctor vitae id lacus. Maecenas feugiat scelerisque mollis. In ac diam egestas, tincidunt elit sit amet, egestas ex. Nulla egestas tempor hendrerit. Sed ultrices sagittis neque, et aliquam urna tincidunt id. Donec quis egestas turpis. Aenean consectetur mauris nisl, nec fringilla elit cursus vitae. Vivamus egestas semper est eleifend fermentum. Vivamus vel augue sed lacus feugiat euismod quis sollicitudin orci. Aenean bibendum ipsum et fermentum consectetur. Nullam consequat tristique lacus, et vehicula risus sodales at. Etiam eros nisl, interdum et tincidunt a, imperdiet nec dui. Vestibulum pulvinar tortor ac tortor vestibulum tempor. Nulla feugiat tortor ut rhoncus mollis. Donec eu odio vitae nulla vulputate semper a id sapien. Phasellus dui neque, cursus eu accumsan sed, vestibulum eu ex. Mauris mollis sapien eget semper finibus. Suspendisse potenti. Donec at ante hendrerit, vestibulum urna et, auctor ipsum. Nam iaculis pharetra vulputate. Aenean vel turpis vehicula, sagittis augue eget, euismod metus. Phasellus sagittis, justo vitae faucibus laoreet, mauris ex mollis tellus, non vestibulum justo mauris eget massa. Nullam mi eros, interdum at mi ut, semper viverra nisl. Quisque congue bibendum nibh sit amet scelerisque. Vivamus dignissim rutrum dolor, vitae placerat urna hendrerit ut. Suspendisse id enim non dui luctus dictum. Nunc consectetur nisi odio. Duis interdum bibendum magna. Sed bibendum at massa quis pulvinar. Vivamus id nisl vel elit faucibus congue. Nullam bibendum, turpis ac accumsan sagittis, sapien purus volutpat nulla, nec scelerisque augue dolor in justo.");
        $manager->persist($post);

        $manager->flush();
    }
}
