<div class="container">
    <h2 class="shop-title">Shop</h2>

    <div class="category-buttons">
        <button class="btn active" data-category="all">All</button>
        @foreach($categories as $category)
            <button class="btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
        @endforeach
    </div>

    <!-- Products Grid -->
    <div class="products-section">
        <div id="product-grid" class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" style="height: 200px">
                        <span class="heart-icon">♡</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title text-left">{{ $product->name }}</h3>
                        <h6 class="product-desc text-left">{{ $product->description }}</h6>
                        <div class="product-footer">
                            <button class="add-btn">Add to Cart</button>
                            <span class="price">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .container {
  margin: 0 auto;
  padding: 40px 20px;
  font-family: 'Poppins', sans-serif;
}

.shop-title {
  text-align: center;
  color: #651B7A;
  font-weight: 700;
  font-size: 22px;
  margin-bottom: 30px;
}

.category-buttons {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 12px;
  margin-bottom: 40px;
}

.category-buttons .btn {
  border: 1.5px solid #651B7A;
  padding: 8px 18px;
  border-radius: 25px;
  color: #651B7A;
  background: #fff;
  cursor: pointer;
  transition: 0.3s ease;
  font-size: 14px;
}

.category-buttons .btn.active,
.category-buttons .btn:hover {
  background: #651B7A;
  color: #fff;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
  gap: 25px;
}

.product-card {
  background: #F8F0F8;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(101, 27, 122, 0.1);
  text-align: center;
  padding: 12px;
  position: relative;
  transition: 0.3s ease;
}

.product-card:hover {
  transform: translateY(-5px);
}

.product-image {
  position: relative;
}

.product-image img {
  width: 100%;
  object-fit: cover;
  border-radius: 15px;
}

.heart-icon {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 18px;
  color: #651B7A;
  cursor: pointer;
  background: rgba(255,255,255,0.8);
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.3s ease;
}

.product-info {
  margin-top: 10px;
}

.product-title {
  font-size: 14px;
  font-weight: 600;
  color: #651B7A;
  margin: 8px 0;
}
.product-desc {
  font-size: 12px;
  color: #707070;
  margin: 8px 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.product-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 6px;
}

.add-btn {
  background: #651B7A;
  color: #fff;
  border: none;
  border-radius: 12px;
  padding: 5px 12px;
  font-size: 12px;
  cursor: pointer;
  transition: 0.3s ease;
}

.add-btn:hover {
  background: #4e125c;
}

.price {
  font-weight: bold;
  color: #651B7A;
  font-size: 14px;
}

</style>
<!-- ✅ Add jQuery CDN if not included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        // Init
        updateCartUI();
        renderCartPanel();

        // === Event: Filter by Category ===
        $('.category-buttons .btn').on('click', function () {
            const categoryId = $(this).data('category');
            $('.category-buttons .btn').removeClass('active');
            $(this).addClass('active');

            $.ajax({
                url: '/shop/filter/' + categoryId,
                type: 'GET',
                success: function (products) {
                    let html = '';

                    if (products.length > 0) {
                        products.forEach(product => {
                            html += `
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="/storage/${product.image_url}" alt="Product Image" style="height: 200px">
                                        <span class="heart-icon">♡</span>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title text-left">${product.name}</h3>
                                        <h6 class="product-desc text-left">${product.description}</h6>
                                        <div class="product-footer">
                                            <button class="add-btn">Add to Cart</button>
                                            <span class="price">$${parseFloat(product.price).toFixed(2)}</span>
                                        </div>
                                    </div>
                                </div>`;
                        });
                    } else {
                        html = '<p>No products found for this category.</p>';
                    }

                    $('#product-grid').html(html);
                },
                error: function () {
                    alert('Failed to load products. Please try again.');
                }
            });
        });

        // === Event: Add to Cart ===
        $(document).on('click', '.add-btn', function () {
            const productCard = $(this).closest('.product-card');
            const name = productCard.find('.product-title').text();
            const price = productCard.find('.price').text();
            const imageSrc = productCard.find('img').attr('src');

            let existing = cartItems.find(item => item.name === name);

            if (existing) {
                existing.quantity += 1;
            } else {
                cartItems.push({ name, price, imageSrc, quantity: 1 });
            }

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            updateCartUI();
            renderCartPanel();
        });

        // === Event: Toggle Cart Panel ===
        $('.fa-shopping-cart').on('click', function (e) {
            e.preventDefault();
            $('#cart-panel').toggleClass('active');
            $('#cart-overlay').toggleClass('active');
            $('body').toggleClass('cart-open');
        });

        // === Event: Close Cart Panel on Overlay Click ===
        $('#cart-overlay').on('click', function () {
            $('#cart-panel').removeClass('active');
            $('#cart-overlay').removeClass('active');
            $('body').removeClass('cart-open');
        });

        // === Event: Increase Quantity ===
        $(document).on('click', '.increase', function () {
            const index = $(this).closest('.cart-item').data('index');
            cartItems[index].quantity++;
            saveCart();
        });

        // === Event: Decrease Quantity ===
        $(document).on('click', '.decrease', function () {
            const index = $(this).closest('.cart-item').data('index');
            if (cartItems[index].quantity > 1) {
                cartItems[index].quantity--;
                saveCart();
            }
        });

        // === Event: Delete Cart Item ===
        $(document).on('click', '.delete-btn', function () {
            const index = $(this).closest('.cart-item').data('index');
            cartItems.splice(index, 1);
            saveCart();
        });

        // === Event: Apply Discount (Demo) ===
        $('#apply-discount').on('click', function () {
            alert("Discount applied (demo only)");
            renderCartPanel();
        });

        // === Function: Save & Render Cart ===
        function saveCart() {
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            updateCartUI();
            renderCartPanel();
        }

        // === Function: Update Cart Icon Count ===
        function updateCartUI() {
            const count = cartItems.reduce((sum, item) => sum + item.quantity, 0);
            $('#cart-count').text(count);
        }

        // === Function: Render Cart Panel ===
        function renderCartPanel() {
            if (cartItems.length === 0) {
                $('#cart-items-list').html('<p>No items in cart.</p>');
                $('#subtotal, #discount, #total').text('$0.00');
                return;
            }

            let html = '';
            let subtotal = 0;

            cartItems.forEach((item, i) => {
                const priceNum = parseFloat(item.price.replace('$', ''));
                const itemTotal = priceNum * item.quantity;
                subtotal += itemTotal;

                html += `
                    <div class="cart-item" data-index="${i}">
                        <img src="${item.imageSrc}" alt="${item.name}">
                        <div class="cart-details">
                            <h4>${item.name}</h4>
                            <div class="price">${item.price}</div>
                            <div class="qty-controls">
                                <button class="qty-btn decrease">-</button>
                                <span class="qty-count">${item.quantity}</span>
                                <button class="qty-btn increase">+</button>
                            </div>
                        </div>
                        <button class="delete-btn" title="Remove item">
                            <i class="fa fa-trash-alt" style="color: red"></i>
                        </button>
                    </div>`;
            });

            const discount = 25;
            const total = subtotal - discount;

            $('#cart-items-list').html(html);
            $('#subtotal').text(`$${subtotal.toFixed(2)}`);
            $('#discount').text(`$${discount.toFixed(2)}`);
            $('#total').text(`$${total.toFixed(2)}`);
        }

    });
</script>
