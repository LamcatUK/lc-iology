<!-- stock list -->
<section class="stock-list">
    <div class="container">
        <section id="filters" class="row mb-4 g-4">
            <div class="col-md-4">
                <label for="by-cat">Category</label>
                <select id="by-cat" data-filter-group="category" class="form-select">
                    <option data-filter="" value="">All</option>
                    <option data-filter=".bulbs" value=".bulbs">Bulbs</option>
                    <option data-filter=".climbers" value=".climbers">Climbers</option>
                    <option data-filter=".edibles" value=".edibles">Edibles</option>
                    <option data-filter=".ferns" value=".ferns">Ferns</option>
                    <option data-filter=".grasses" value=".grasses">Grasses</option>
                    <option data-filter=".perennials" value=".perennials">Perennials</option>
                    <option data-filter=".shrubs" value=".shrubs">Shrubs</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="quicksearch">Search</label>
                <input type="text" id="quicksearch" class="quicksearch form-control" placeholder="Search" />
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button id="reset">Reset Filters</button>
                <button id="clear">Clear Selection</button>
            </div>
        </section>
    </div>
<?php

// $inputFileName = get_stylesheet_directory() . '/sampledata.xlsx';

$inputFileID = get_field('full_stock_list','options');
$inputFileName = get_attached_file($inputFileID);

require __DIR__ . '/../../vendor/autoload.php';

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($inputFileName);

$data = $spreadsheet->getActiveSheet()->toArray(null,true,true,true);

$title = array_shift($data);
?>
    <section class="all_stock container pb-5">
        <section class="sort">
            <div class="btn-group" id="sorts">
                <span class="button category" data-sort-value="category">Category</span>
                <button class="button asc genus" data-sort-value="genus">Genus <i class="fa fa-sort"></i></button>
                <button class="button asc species" data-sort-value="species">Species <i class="fa fa-sort"></i></button>
                <button class="button asc variant" data-sort-value="variant">Variant <i class="fa fa-sort"></i></button>
                <span class="button enquire">Select</span>
            </div>
        </section>
        <section class="content">
            <ul class='no-transition list-group tb-data' id='isotope'>
<?php

usort($data, fn($a, $b) => $a['A'] <=> $b['A']);

foreach ($data as $r) {
	$cat = $r['A'];
	$genus = $r['B'];
	$species = $r['C'];
	$variant = $r['D'];

    $fullname = $genus . ' ' . $species . ' ' . $variant;
    // $full = urlencode($fullname);
    $full = $fullname;

	?>
                <li class='tb-data-single list-group-item <?=strtolower($cat)?> <?=$genus?> <?=$species?> <?=$variant?>'
                    data-category='<?=$cat?>' data-genus='<?=$genus?>' data-species='<?=$species?>' data-variant='<?=$variant?>'>
                    <span class="category"><?=$cat?></span>
                    <span class="genus"><?=$genus?></span>
                    <span class="species"><?=$species?></span>
                    <span class="variant"><?=$variant?></span>
                    <span class="enquire"><input type="checkbox" name="selection" value="<?=$full?>" class="selection form-check-input"></span>
                </li>
	<?php
}

?>
            </ul>
        </section>
    </section>
    <!-- form -->
    <a id="form" class="anchor"></a>
    <section class="frm bg--flower py-5">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-4">
                    <h2>Enquire</h2>
                    <p>Make your selection above</p>
                </div>
                <div class="col-lg-8">
                    <div class="frm__card">
                        <?=do_shortcode('[contact-form-7 id="438"]')?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php

add_action('wp_footer',function(){
    ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.0.0/isotope.pkgd.min.js"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/stock-list.js"></script>
    <?php
},9999);
