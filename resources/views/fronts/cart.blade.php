<x-store-front-layout>

    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-cart-listing">
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th style="text-align: center">All Products</th>
                  <th style="text-align: center">Price</th>
                  <th style="text-align: center">Quantity</th>
                  <th style="text-align: center">Total</th>
                  <th style="text-align: center"></th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $carts as $cart )


                <tr>
                  <td><a class="ps-product__preview" href="{{ route('product.details', $cart->product->slug ) }}">
                    <img class="mr-15" src="{{ $cart->product->image_url  }}" style="width:400px; height:200px" alt=""> {{ $cart->product->name  }}</a></td>
                  <td>${{ $cart->product->price }}</td>
                  <td>
                    <div class="form-group--number" style="display: inline-flex">
                      <button class="minus"><span>-</span></button>
                      <input class="form-control" type="text" name="qty" style="top: 0" value="{{ $cart->quantity  }}">
                      <button class="plus"><span>+</span></button>
                    </div>
                  </td>
                  <td>${{ $cart->product->price * $cart->quantity   }}</td>
                  <td>
                    <div class="ps-remove"></div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="ps-cart__actions">
              <div class="ps-cart__promotion">
                <div class="form-group">
                  <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                    <input class="form-control" type="text" placeholder="Promo Code">
                  </div>
                </div>
                <div class="form-group">
                  <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                </div>
              </div>
              <div class="ps-cart__total">
                <h3>Total Price: <span> {{ $total }} $</span></h3>
                <a class="ps-btn" href="{{ route('checkout') }}">Process to checkout<i class="ps-icon-next"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-subscribe">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                  <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                  <form class="ps-subscribe__form" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="">
                    <button>Sign up now</button>
                  </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                  <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                </div>
          </div>
        </div>
      </div>








</x-store-front-layout>
