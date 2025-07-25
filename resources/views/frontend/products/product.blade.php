@extends('layouts.index')
@section('content')
<div class="container">
  <!-- Banner Section -->
  <div class="banner-section">
    <div class="banner-content">
      <h1>Enjoy Shopping!</h1>
      <p>Up To <span class="discount">70%</span></p>
    </div>
    <div class="banner-image">
      <div class="icon-item pink"></div>
    </div>
  </div>

  <!-- Category Sidebar and Products -->
  <div class="shop-layout">
    <!-- Category Sidebar -->
    <div class="category-sidebar">
      <div class="category-item active">All</div>
      <div class="category-item">Sun Bloc</div>
      <div class="category-item">Cleanser</div>
      <div class="category-item">Toner</div>
      <div class="category-item">Lipstick</div>
      <div class="category-item">Mask</div>
      <div class="category-item">Serum</div>
      <div class="category-item">Serum</div>
      <div class="category-item">Serum</div>
      <div class="category-item">Serum</div>
      <div class="category-item">Serum</div>
    </div>
    <!-- Products Grid -->
      <div class="products-section">
          <div class="product-grid">
              @foreach ($products as $product)
                  <div class="product-card">
                      <div class="product-image">
                          <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image">
                          <span class="heart-icon">♡</span>
                      </div>
                      <div class="product-info">
                          <h3 class="product-title">{{ $product->name }}</h3>
                          <h6 class="product-desc">{{ $product->description }}</h6>
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
</div>
@endsection

<style>
.container {
  max-width: 1300px;
  margin: 0 auto;
  padding: 20px;
  font-family: 'Poppins', sans-serif;
}

/* Banner Section */
.banner-section {
  background: linear-gradient(135deg, #E8D5F0 0%, #F0E8F8 100%);
  border-radius: 20px;
  padding: 30px;
  margin-bottom: 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  overflow: hidden;
}

.banner-content h1 {
  color: #651B7A;
  font-size: 28px;
  font-weight: 700;
  margin: 0 0 10px 0;
}

.banner-content p {
  color: #651B7A;
  font-size: 18px;
  margin: 0;
}

.banner-content .discount {
  color: #FF4757;
  font-size: 36px;
  font-weight: 800;
}

.banner-image {
  position: relative;
  background: none ;
}

.icon-item {
  width: 120px;
  height: 150px;

}

.icon-item.pink {
  background-image: url('{{ asset('frontend/assets/img/product_banner.png') }}');
  background-size: cover;
  background-position: center;
}

/* Shop Layout */
.shop-layout {
  display: flex;
  gap: 30px;
}

/* Category Sidebar */
.category-sidebar {
  width: 200px;
  flex-shrink: 0;
}

.category-item {
  background: #F8F0F8;
  border: 1px solid #E0E0E0;
  padding: 12px 20px;
  margin-bottom: 2px;
  cursor: pointer;
  transition: all 0.3s ease;
  color: #651B7A;
  font-weight: 500;
  font-size: 14px;
}

.category-item:first-child {
  border-radius: 8px 8px 0 0;
}

.category-item:last-child {
  border-radius: 0 0 8px 8px;
}

.category-item.active {
  background: #651B7A;
  color: white;
}

.category-item:hover:not(.active) {
  background: #F0E8F8;
}

/* Products Section */
.products-section {
  flex: 1;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 20px;
}

.product-card {
  background: #F8F0F8;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(101, 27, 122, 0.1);
  padding: 15px;
  position: relative;
  transition: 0.3s ease;
}

.product-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(101, 27, 122, 0.15);
}

.product-image {
  position: relative;
  margin-bottom: 12px;
}

.product-image img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
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

.heart-icon:hover {
  background: rgba(255,255,255,1);
  transform: scale(1.1);
}

.product-info {
  text-align: left;
}

.product-title {
  font-size: 16px;
  font-weight: 600;
  color: #651B7A;
  margin: 0 0 5px 0;
}

.product-desc {
  font-size: 12px;
  color: #707070;
  margin: 0 0 12px 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.product-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.add-btn {
  background: #651B7A;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 8px 16px;
  font-size: 12px;
  cursor: pointer;
  transition: 0.3s ease;
  font-weight: 500;
}

.add-btn:hover {
  background: #4e125c;
}

.price {
  font-weight: 600;
  color: #651B7A;
  font-size: 16px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .banner-section {
    flex-direction: column;
    text-align: center;
    padding: 20px;
  }

  .banner-content {
    margin-bottom: 20px;
  }

  .shop-layout {
    flex-direction: column;
  }

  .category-sidebar {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
  }

  .category-item {
    border-radius: 20px !important;
    margin-bottom: 0;
    flex: 1;
    min-width: 100px;
    text-align: center;
  }

  .product-grid {
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 15px;
  }
}
</style>
