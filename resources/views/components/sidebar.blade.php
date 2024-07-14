
    <div class="card">
        <div class="list-group">
            <a href="/product" class="list-group-item list-group-item-action {{request()->is("product") ? 'active' : ''}}" aria-current="true">
                Show Product
            </a>
            <a href="/product/create" class="list-group-item list-group-item-action {{request()->routeIs("product.create") || request()->routeIs("product.edit") ? 'active' : ''}}">Form Product</a>
        </div>
    </div>
