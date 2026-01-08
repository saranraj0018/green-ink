<div class="bg-white rounded-xl p-5 sticky top-5">

    <h3 class="text-lg font-semibold mb-4">Order Summary</h3>

    <!-- Coupon -->
    <div class="flex gap-2 mb-4 border border-gray-300 rounded-full p-1">
        <input type="text" placeholder="Enter Coupon Code" class="w-full px-4 py-1 text-sm focus:outline-none">
        <button class="border py-1 px-3 btn-white rounded-full text-xs font-medium">
            Apply
        </button>
    </div>

    <!-- Summary Rows -->
    <div class="space-y-2 text-sm">
        <div class="flex justify-between">
            <span>Items</span>
            <span>9</span>
        </div>

        <div class="flex justify-between">
            <span>Sub Total</span>
            <span>₹200.00</span>
        </div>

        <div class="flex justify-between">
            <span>Shipping</span>
            <span>₹200.00</span>
        </div>

        <div class="flex justify-between">
            <span>Taxes</span>
            <span>₹200.00</span>
        </div>

        <div class="flex justify-between text-green-600">
            <span>Coupon Discount</span>
            <span>-₹10.00</span>
        </div>

        <hr>

        <div class="flex justify-between font-semibold text-lg">
            <span>Total</span>
            <span>₹200.00</span>
        </div>
    </div>

    <a href="/cart/address" class="text-center">
        <p class="w-full mt-5 bg-primary text-white rounded-full p-1">
            Place Order
        </p>
    </a>
</div>
<p class="text-xs text-gray-500 mt-3 cursor-pointer underline">
    Clear Shopping Cart
</p>
