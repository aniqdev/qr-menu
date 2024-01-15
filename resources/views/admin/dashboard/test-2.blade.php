@extends('layouts.back')

@section('content')
<div class="shadow-block" id="admin_dashboard">
		<h1 class="mb-4">Shopping Cart</h1>

		<table class="table table-bordered cart-table">
			<thead>
				<tr>
					<th scope="col">Product</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Sum</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">T-Shirt</th>
					<td>$25.00</td>
					<td>
						<div class="d-flex">
							<button class="btn btn-outline-secondary">-</button>
							<input type="number" class="form-control text-center mx-1" value="1">
							<button class="btn btn-outline-secondary">+</button>
						</div>
					</td>
					<td>$25.00</td>
				</tr>
				<tr>
					<th scope="row">Coffee Mug</th>
					<td>$10.00</td>
					<td>
						<div class="d-flex">
							<button class="btn btn-outline-secondary">-</button>
							<input type="number" class="form-control text-center mx-1" value="2">
							<button class="btn btn-outline-secondary">+</button>
						</div>
					</td>
					<td>$20.00</td>
				</tr>
			</tbody>
			<tfoot>
				{{-- <tr>
					<td colspan="4" class="text-end">Subtotal:</td>
					<td>$0.00</td>
				</tr> --}}
				{{-- <tr>
					<td colspan="4" class="text-end">Shipping:</td>
					<td>$0.00</td>
				</tr> --}}
				<tr>
					<td colspan="3" class="text-end"><b>Total:</b></td>
					<td>$0.00</td>
				</tr>
			</tfoot>
		</table>

		<div class="text-end">
			<a href="#" class="btn btn-primary">Checkout</a>
		</div>
	</div>
</div>

@endsection