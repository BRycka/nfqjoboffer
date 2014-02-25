<ul>
    {foreach from=$products item="product"}
        <li>#{$product->product_id} {$product->product_name} {$product->price} (PVM {$product->calculateVat()})</li>
    {/foreach}
</ul>