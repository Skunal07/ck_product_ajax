<div class="row">
    <?php foreach ($products as $product) :
        if ($product->product_category->status == 0) { ?>
            <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
                <a href="http://localhost:8765/Admin/viewproduct/<?= $product->id ?>" class="item-wrap fancybox">
                    <div class="work-info">
                        <span><?= $product->product_title ?></span>
                    </div>
                    <?= $this->Html->image(h($product->product_image), array('width' => '200px', 'class' => 'aimage')) ?>
                </a>
            </div>
    <?php
        }
    endforeach; ?>
</div>