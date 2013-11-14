<div id="content_brands"
     class="{if $selected_section && $selected_section != "description"}hidden{/if}">
    {foreach from=$company_brands item="brand"}
        <div class="company_brand_wrapper">
            <div class="preview-image-wrapper">

                <a href="index.php?dispatch=product_features.view&variant_id={$brand.variant_id}">
                    <img class="pict" src="{if isset($smarty.server.HTTPS)}https://{else}http://{/if}{$smarty.server.HTTP_HOST}/images/feature_variant/1/{$brand.image_path}" alt="" title="">
                </a>

{if isset($smarty.session.abc)} ... {/if}
            </div>
            <a href="index.php?dispatch=product_features.view&variant_id={$brand.variant_id}">
                {$brand.variant}
            </a>
        </div>
    {/foreach}
</div>