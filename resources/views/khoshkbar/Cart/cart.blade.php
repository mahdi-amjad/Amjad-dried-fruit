@extends('khoshkbar.layout.master')

@section('content')
<section id="page-breadcrumb" class="breadcrumb-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6 col-md-3 ps-0">
          <div class="page-title text-left ">
            <h1>سبد خرید</h1>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-9 p-0">
          <nav aria-label="breadcrumb" class="theme-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item"><a href="#">سبد خرید</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</section>

<section class="container-fluid inner-section">
    <div class="container p-0">
       <div class="row mt-3 mb-3">
         <div class="col-md-4 col-12  order-md-3 pr-xl-0">
          <div class="cart-options">
            <ul class="cart-opt p-0">
              <li class="cart-summary-item">
                <span class="c-cost">مجموع قیمت سبد خرید:</span>
                <span class="v-cost">{{ number_format($cartItems->sum(function($item) {
                        return $item->product->price * $item->quantity;
                    })) }} تومان</span>
              </li>
              <li class="cart-summary-item payable">
                <span class="c-cost">مبلغ قابل پرداخت:</span>
                <span class="v-cost">{{ number_format($cartItems->sum(function($item) {
                        return $item->product->price * $item->quantity;
                    })) }} تومان</span>
              </li>
              <li class="text-center complate-sale-btn">
                <a href="#" class="btn btn-primary complate-sale">تایید و ادامه فرایند خرید</a>
              </li>
            </ul>
          </div>
         </div>
   <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">کد تخفیف</label>
                        <div class="flex space-x-2 space-x-reverse">
                            <input type="text" 
                                   placeholder="کد تخفیف را وارد کنید" 
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors">
                                اعمال
                            </button>
                        </div>
                    </div>
         <div class="col-md-8 col-12 datail-card-box pl-xl-0">
          <div class="cart-items-inner">
            @foreach($cartItems as $item)
            <div class="cart-item clearfix cart-campaign">
              <div class="column remove">
                <span class="remove-from-cart " data-title="حذف">
                  <label for="remove_input_{{ $item->id }}" class="td-title">
                    <button class="btn btn-del" onclick="removeFromCart({{ $item->id }})">
                      <img src="{{ asset('Assets/images/cancel.svg') }}" width="10">
                    </button>
                  </label>
                </span>
              </div>

              <div class="column product-image">
                <a href="#" class="img-sale">
                  <img src="{{ asset('AdminAssets.Product-image/'.$item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid">

                </a>
              </div>

              <div class="content-products">
                <div class="column product-title">
                  <div class="product-cart">
                    <a href="#">{{ $item->product->name }}</a>
                  </div>
                </div>

                <div class="column count">
                  <div class="quantity">
                    <div class="quantity-up" onclick="updateQuantity({{ $item->id }}, 1)">
                      <img src="{{ asset('Assets/images/plus.svg') }}" width="12px">
                    </div>
                    <input type="text" name="quantity[]" value="{{ $item->quantity }}" min="1" id="quantity{{ $item->id }}" class="form-control quantity-val" step="1">
                    <div class="quantity-down" onclick="updateQuantity({{ $item->id }}, -1)">
                      <i class="fas fa-minus"></i>
                    </div>
                  </div>
                </div>

                <div class="column price">
                  <span class="subtotal">
                    <span class="product-subtotal">{{ number_format($item->product->price * $item->quantity) }} تومان</span>
                  </span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
         </div>

       </div>
     </div>
</section>

<script>
  function updateQuantity(itemId, change) {
    let quantityInput = document.getElementById('quantity' + itemId);
    let currentQuantity = parseInt(quantityInput.value);
    let newQuantity = currentQuantity + change;

    if (newQuantity >= 1) {
      quantityInput.value = newQuantity;
      // Update the quantity on the server
      // You can use AJAX to send a request to update the quantity in the database
    }
  }

  function removeFromCart(itemId) {
    // Implement AJAX or form submission to remove the item from the cart
  }
</script>

@endsection
