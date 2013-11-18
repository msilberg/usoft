{split data=$categories size=$columns|default:"3" assign="splitted_categories"}
{math equation="floor(100/x)" x=$columns|default:"3" assign="cell_width"}

<table class="table-width">
{foreach from=$splitted_categories item="scats"}
    <tr>
        {foreach from=$scats item="category"}
            {if $category}
                <td class="center valign-top" style="width: {$cell_width}%">
                    <p class="margin-bottom">
                        <a href="{"categories.view?category_id=`$category.category_id`"|fn_url}" class="strong">{$category.category}</a>
                    </p>
                </td>
            {else}
                <td style="width: {$cell_width}%">&nbsp;</td>
            {/if}
        {/foreach}
    </tr>
{/foreach}
</table>

{capture name="mainbox_title"}{$title}{/capture}