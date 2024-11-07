@extends('layouts.master')


@section('style')
<style>
.alert{
  color: #e92e2e;
}
.rate {
 float: left;
 height: 46px;
 padding: 0 10px;
}
.rate:not(:checked) > input {
 position:absolute;
 display: none;
}
.rate:not(:checked) > label {
 float:right;
 width:1em;
 overflow:hidden;
 white-space:nowrap;
 cursor:pointer;
 font-size:30px;
 color:#ccc;
}
.rated:not(:checked) > label {
 float:right;
 width:1em;
 overflow:hidden;
 white-space:nowrap;
 cursor:pointer;
 font-size:30px;
 color:#ccc;
}
.rate:not(:checked) > label:before {
 content: '★ ';
}
.rate > input:checked ~ label {
 color: #ffc700;
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
 color: #deb217;
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
 color: #c59b08;
}
.star-rating-complete{
  color: #c59b08;
}
.rating-container .form-control:hover, .rating-container .form-control:focus{
 background: #fff;
 border: 1px solid #ced4da;
}
.rating-container textarea:focus, .rating-container input:focus {
 color: #000;
}
.rated {
 float: left;
 height: 46px;
 padding: 0 10px;
}
.rated:not(:checked) > input {
 position:absolute;
 display: none;
}
.rated:not(:checked) > label {
 float:right;
 width:1em;
 overflow:hidden;
 white-space:nowrap;
 cursor:pointer;
 font-size:30px;
 color:#ffc700;
}
.rated:not(:checked) > label:before {
 content: '★ ';
}
.rated > input:checked ~ label {
 color: #ffc700;
}
.rated:not(:checked) > label:hover,
.rated:not(:checked) > label:hover ~ label {
 color: #deb217;
}
.rated > input:checked + label:hover,
.rated > input:checked + label:hover ~ label,
.rated > input:checked ~ label:hover,
.rated > input:checked ~ label:hover ~ label,
.rated > label:hover ~ input:checked ~ label {
 color: #c59b08;
}
</style> 

@endsection 


@section('content')

<div class="container my-5">
  <!-- content -->
  <section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
            </a>
          </div>
          <div class="d-flex justify-content-center mb-3">
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
            </a>
          </div>
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
             {{ $product->name }}
           </h4>

           <div class="mb-3">
            <span class="h5">${{ number_format($product->price, 2) }}</span>
            
          </div>

          <p>
            {{ $product->description }}
          </p>

          <div class="row">
            <dt class="col-3">Stock: {{ $product->stock }}</dt>
            
          </div>

          <hr />

          <div class="row">
           <div class="col mt-4">
            <form class="py-2 px-4" action="{{route('review.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
             @csrf
             <p class="font-weight-bold ">Review</p>
             <div class="form-group row">
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="col">
                @if(!empty($review->rating))
                <div class="rate">
                  @for($i=1; $i<=5; $i++)
                  <input type="radio"  @if($i == $review->rating ) checked @endif  id="star{{$i}}" class="rate" name="rating" value="{{$i}}"/> 
                  <label for="star{{$i}}" class="" title="text">{{$i}} stars</label>
                  @endfor


                </div>
                @else

                <div class="rate">
                  <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                  <label for="star5" title="text">5 stars</label>
                  <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                  <label for="star4" title="text">4 stars</label>
                  <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                  <label for="star3" title="text">3 stars</label>
                  <input type="radio" id="star2" class="rate" name="rating" value="2">
                  <label for="star2" title="text">2 stars</label>
                  <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                  <label for="star1" title="text">1 star</label>
                </div>
                @endif
              </div>
            </div>
            <div class="form-group row mt-4">

              <div class="col">
               <p class="font-weight-bold ">Add Comment</p>
               <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200" required > </textarea>
             </div>
           </div>

           @if ($errors->has('comment'))
           <span class="invalid feedback"role="alert">
            <strong class="alert ">{{ $errors->first('comment') }}.</strong>
          </span>
          @endif
          <div class="mt-3 text-right">
            <button class="btn btn-sm py-2 px-3 btn-info">Submit
            </button>
          </div>
        </form>
      </div>
    </div>

  </div>
</main>
</div>
</div>
</section>
</div>
<!-- content -->



@endsection