{if $smarty.capture.title|trim}
    {$smarty.capture.title nofilter}
{else}
    <span>{__("{$title nofilter}")}</span>
{/if}