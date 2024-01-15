<?php


namespace App\Services;


class CartService
{
	private static $cartItems = null;

	public static function addProduct($productId, $amount = 1)
	{
		if(is_null(self::$cartItems)) self::$cartItems = session('cart', []);

		if (empty(self::$cartItems[$productId])) {
			self::$cartItems[$productId] = 0;
		}

		self::changeItemQuantity($productId, +$amount);
	}

	public static function subProduct($productId, $amount = 1)
	{
		if(is_null(self::$cartItems)) self::$cartItems = session('cart', []);

		if (empty(self::$cartItems[$productId])) {
			return;
		}

		self::changeItemQuantity($productId, -$amount);
	}

	private static function changeItemQuantity($productId, int $amount)
	{
		self::$cartItems[$productId] += $amount;

		session(['cart' => self::$cartItems]);
	}

	public static function deleteProduct($productId)
	{
		if(is_null(self::$cartItems)) self::$cartItems = session('cart', []);

		if (empty(self::$cartItems[$productId])) {
			return;
		}

		unset(self::$cartItems[$productId]);

		session(['cart' => self::$cartItems]);
	}

	public static function clearCart()
	{
		if(is_null(self::$cartItems)) self::$cartItems = session('cart', []);

		self::$cartItems = [];

		session(['cart' => self::$cartItems]);
	}

	public function cartTableHtml()
	{
		if(is_null(self::$cartItems)) self::$cartItems = session('cart', []);

		$cartItems = array_map(function ($cartItem)
		{
			return [
				'product' => ['asd' => 'qwe'],
			];
		}, self::$cartItems);

		return view('admin.payments.blocks.cart-table')->render();
	}
}
