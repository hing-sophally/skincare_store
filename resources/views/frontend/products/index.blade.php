<div class="container">
  <h2 class="shop-title">Shop</h2>
  
  <div class="category-buttons">
    <button class="btn active">All</button>
    <button class="btn">Sun Screen</button>
    <button class="btn">Sun Bloc</button>
    <button class="btn">Cleanser</button>
    <button class="btn">Toner</button>
    <button class="btn">Lipstick</button>
    <button class="btn">Mask</button>
    <button class="btn">Serum</button>
  </div>

  <div class="product-grid">
    @for ($i = 0; $i < 12; $i++)
    <div class="product-card">
      <div class="product-image">
        <img src="{{ asset('frontend/assets/img/p1.jpg') }}" alt="Product Image">
        <span class="heart-icon">♡</span>
      </div>
      <div class="product-info">
        <h3 class="product-title text-left">Mary and May</h3>
        <h6 class="product-desc text-left">Collagen Line 3step Starter Kit</h6>

        <div class="product-footer">
          <button class="add-btn">Add to Cart</button>
          <span class="price">$19.99</span>
        </div>
      </div>
    </div>
    @endfor
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