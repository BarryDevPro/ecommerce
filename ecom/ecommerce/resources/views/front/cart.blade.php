@extends('front.base')

@section('title')
    Cart
@endsection

@section('content')
    	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  

  <!--================Cart Area =================-->
  <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach (session()->get('cart') as $produitQte)
                         <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                    <img src="{{config('images.path')}}/{{$produitQte->getProduit()->image}}" alt="" width="150px" height="150px">
                                    </div>
                                    <div class="media-body">
                                    <p>{{$produitQte->getProduit()->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{$produitQte->getProduit()->prixUnitaire}}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    {{$produitQte->getQuantite()}}
                                   
                            </td>
                            <td>
                            <h5>{{$produitQte->getProduit()->prixUnitaire * $produitQte->getQuantite()}} FCFA</h5>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        {{-- {!! link_to_route('cart.edit', 'Modifier', ['key'=>'cart-'.$produitQte->getProduit()->id], ['class' => 'btn btn-primary']) !!} --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$produitQte->getProduit()->id}}">
                                            MODIFIER
                                          </button>

                                          
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::open(['method'=>'POST' , 'route'=>['cart.delete' , 'cart-'.$produitQte->getProduit()->id]]) !!}
                                            {!! Form::hidden('key', 'cart-'.$produitQte->getProduit()->id ,null) !!}
                                        {!! Form::submit("SUPPRIMER", ['class' => 'btn btn-danger' , 'onclick' => 'return confirm(\'Vraiment supprimer ce produit ?\')']) !!} {!! Form::close() !!}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$produitQte->getProduit()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edition</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <p>Veuillez selectionner la quantité de votre produit</p>
                                    {!! Form::open(['method'=>'POST' , 'route'=>['cart.update']]) !!}
                                    {!! Form::hidden('id',$produitQte->getProduit()->id ,null) !!}
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group row">
                                        
                                                <select name="quantite"  id='seluser' class="form-control">
                                                  
                                                    @for ($i = 1; $i <= $produitQte->getProduit()->quantite; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                               
                                            </div>
                                        
                                        </div>
                                        <div class="col-md-2">
                                            {!! Form::submit("Editer", ['class' => 'btn btn-primary']) !!} {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                                </div>
                            </div>
                            </div>
                        </div>
  
                         @endforeach

                         <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                            <h4>{{session()->get('total' , 0)}} FCFA</h4>
                            </td>
                        </tr>
                         
                          @if (session()->get('total') > 0)
                            <tr class="bottom_button">
                                <td>
                                    
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                    
                                        {!! link_to_route('cart.valide', 'Valider la commande', null, ['class' => 'primary-btn']) !!}
                                        
                                    </div>
                                </td>
                            </tr>
                          @endif
                          
                  </table>
              </div>
          </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

  
  
  
@endsection
@section('script')
    <!-- Script -->
    <script type='text/javascript'>
 
    $(document).ready(function(){
     
      $('#seluser').niceSelect();
     
    });
    </script>
@endsection