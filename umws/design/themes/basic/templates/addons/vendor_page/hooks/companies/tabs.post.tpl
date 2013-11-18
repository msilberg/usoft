<div id="content_brands"
     class="{if $selected_section && $selected_section != "description"}hidden{/if}">
    {foreach from=$company_brands item="brand"}
        <div class="company_brand_wrapper">
            <div class="preview-image-wrapper">
                <a href="index.php?dispatch=product_features.view&variant_id={$brand.variant_id}">
                    <img class="pict" src="images/{if $brand.image_path}feature_variant/1/{$brand.image_path}{else}/no_image.png{/if}" alt="" title="">
                </a>
            </div>
            <a href="index.php?dispatch=product_features.view&variant_id={$brand.variant_id}">
                {$brand.variant}
            </a>
        </div>
    {/foreach}
</div>