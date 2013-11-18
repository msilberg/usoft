<p class="nowrap stars">
    {section name="full_star" loop=$stars.full}<i class="icon-star"></i>{/section}
    {if $stars.part}<i class="icon-star-half"></i>{/if}
    {section name="full_star" loop=$stars.empty}<i class="icon-star-empty"></i>{/section}
</p>