<?php
$acc = random_str(8);
if (get_field('id')) {
    ?>
<a id="<?=get_field('id')?>" class="anchor"></a>
    <?php
}
?>
<!-- faq -->
<section class="faq py-5">
    <div class="container-xl" >
        <?php
        if (get_field('title')) {
            ?>
            <h2 class="text-center mb-4"><?=get_field('title')?></h2>
            <?php
        }
        if (get_field('faq_introduction')) {
            ?>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 mb-4 text-center"><?=get_field('faq_introduction')?></div>
        </div>
            <?php
        }

        $faqs = get_field('faq');
        $len = (int) count($faqs);
        $firsthalf = array_slice($faqs, 0, round($len / 2));
        $secondhalf = array_slice($faqs, round($len / 2));

        ?>
    <div class="row" itemscope="" itemtype="https://schema.org/FAQPage">
        <div class="col-md-6">
            <?php
            $c = 0;
            foreach ($firsthalf as $f) {
                ?>
            <div class="faq__card collapsed" data-bs-toggle="collapse" data-bs-target="#c<?=$c?>" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="question" itemprop="name"><h3><?=$f['question']?></h3></div>
                <div class="answer collapse" id="c<?=$c?>" itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div class="answer__inner" itemprop="text"><?=$f['answer']?></div></div>
            </div>
                <?php
                $c++;
            }
            ?>
        </div>
        <div class="col-md-6">
        <?php
            foreach ($secondhalf as $f) {
                ?>
            <div class="faq__card collapsed" data-bs-toggle="collapse" data-bs-target="#c<?=$c?>" itemscope="" itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="question" itemprop="name"><h3><?=$f['question']?></h3></div>
                <div class="answer collapse" id="c<?=$c?>" itemscope="" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div class="answer__inner" itemprop="text"><?=$f['answer']?></div></div>
            </div>
                <?php
                $c++;
            }
            ?>
        </div>
    </div>
    <?php
        if (get_field('cta')) {
            $c = get_field('cta');
            ?>
    <div class="text-center mt-4">
        <a href="<?=$c['url']?>" target="<?=$c['target']?>" class="btn btn-primary"><?=$c['title']?></a>
    </div>
            <?php
        }
    ?>

    </div>
</section>