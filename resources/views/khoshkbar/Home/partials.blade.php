   <div class="row row-category">

       @foreach ($products as $product)
           <div class="col-6 col-lg-4 col-md-6  col-lg-3 col-xl-3 px-2">
               <div class="item">
                   @php
                       $discount = $product->activeDiscount();
                       $price = $product->discountedPrice();
                   @endphp

                   @if ($discount && $discount->type === 'percent')
                       <span class="offer">
                           <span class="off">
                               {{ round($discount->value, 0) . '%' }}
                           </span>
                       </span>
                   @endif
                   <div class="item-img">
                       <div class="row">
                           <div class="col-12 p-0">
                               <a href="{{ route('Product', $product->id) }}" class="img-pro" target="_blank">
                                   <div class="dark-overlay removeFocusIndicator"></div>
                                   <img src="{{ asset('AdminAssets.Product-image/' . $product->image) }}"
                                       alt="" />
                               </a>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-2">
                       <div class="col-12 text-center pro-name p-0">
                           <a href="{{ route('Product', $product->id) }}">{{ $product->name }}</a>
                       </div>
                   </div>
                   <div class="row mt-2">
                       <div class="col-md-4 d-none d-md-block cost text-left">
                       </div>
                       <div class="col-md-8 col-12 cost text-end pl-0">
                           @if ($price > 0)
                               @if ($product->activeDiscount())
                                   <span class="old-cost">{{ number_format($product->price) }}</span>
                                   <br>
                                   <span class="cost-total">{{ number_format($price) }}</span> <span
                                       class="unit">تومان</span>
                               @else
                                   <span class="cost-total">{{ number_format($product->price) }}</span>
                                   <span class="unit">تومان</span>
                                   <br>
                                   <br>
                               @endif
                           @else
                               <span class="text-danger cost-total ">ناموجود</span>
                               <br>
                               <br>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
       @endforeach

   </div>
