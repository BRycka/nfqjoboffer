<ul>
    {foreach from=$categories item="category"}
    <li>{$category->category_id} {$category->category_name} {$category->products_count}</li>
    {/foreach}
</ul>