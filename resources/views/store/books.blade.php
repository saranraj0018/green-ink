<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="my-container my-10 space-y-3">
    <h2 class="text-center text-xl font-medium uppercase">
        Best Selling Books
    </h2>
    <p class="text-center text-sm text-gray-600">
        Dive into the most talked about books of the season
    </p>

     <div class="text-right">
        <button id="buySelected"
            class="bg-primary text-white px-4 py-2 rounded text-sm">
            Buy Selected
        </button>
    </div>

    <div class="grid grid-cols-12 gap-4 mt-6">
        @foreach ($books as $book)
            <div class="col-span-6 md:col-span-4 lg:col-span-3">
                <div class="rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                   
                    <img src="{{ asset('storage/'.$book->image) }}"
                         alt="{{ $book->name }}"
                         class="w-full lg:h-60">

                   
                    <div class="p-2 md:p-4 space-y-1 bg-[#f4f4f4]">

                       
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-xs md:text-lg line-clamp-1">
                                    {{ $book->name }}
                                </h3>
                                <p class="text-xs md:text-sm text-gray-500">
                                    {{ $book->description }}
                                </p>
                            </div>

                            <div class="flex gap-1 items-center">
                                <i class="fa fa-star text-xs text-yellow-400"></i>
                                <span class="text-xs">
                                    {{ $book->rating ?? 0 }}
                                </span>
                            </div>
                        </div>

            
                        <div class="flex justify-between items-center mt-2">

                            <div class="flex items-center gap-1">
                                <span class="text-lg font-semibold">
                                    ₹{{ $book->sale_price }}
                                </span>
                                <span class="text-xs line-through text-gray-400">
                                    ₹{{ $book->regular_price }}
                                </span>
                            </div>

                        
                            <label class="flex items-center gap-1 cursor-pointer">
                                <input type="checkbox"
                                       class="bookCheckbox"
                                       value="{{ $book->id }}">
                                <span class="text-xs text-gray-500">
                                    Select
                                </span>
                            </label>

                        </div>

                     
                        <button
                            class="buyNowBtn mt-3 bg-primary text-white py-1 px-2
                                   rounded-full text-xs md:text-sm transition w-full"
                            data-book-id="{{ $book->id }}">
                            Buy Now
                        </button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



<!-- ================= PAYMENT MODAL ================= -->

<div id="paymentModal"
     class="fixed inset-0 hidden bg-black/60 flex items-center justify-center z-50">

    <div class="bg-white w-96 p-6 rounded-xl space-y-4">
        <h2 class="text-lg font-semibold text-center">
            Enter Your Details
        </h2>

        <div>
            <label class="text-sm">Full Name</label>
            <input id="pay_name" class="w-full border rounded px-3 py-2">
            <p class="text-xs text-red-500 nameError"></p>
        </div>

        <div>
            <label class="text-sm">Email</label>
            <input id="pay_email" type="email" class="w-full border rounded px-3 py-2">
            <p class="text-xs text-red-500 emailError"></p>
        </div>

        <div>
            <label class="text-sm">Phone</label>
            <input id="pay_phone" class="w-full border rounded px-3 py-2">
            <p class="text-xs text-red-500 phoneError"></p>
        </div>

        <div class="flex gap-3 pt-3">
            <button id="closeModal" class="w-1/2 border py-2 rounded">
                Cancel
            </button>

            <button id="confirmPay" class="w-1/2 bg-primary text-white py-2 rounded">
                Pay Now
            </button>
        </div>
    </div>
</div>

<!-- ================= CASHFREE FORM ================= -->

<form id="cashfreeForm"
      action="/book/cashfree/payments/store"
      method="POST"
      class="hidden">
    @csrf

    <input type="hidden" name="book_ids" id="cf_book_ids">
                        <input type="hidden" name="name" id="cf_name">
                        <input type="hidden" name="email" id="cf_email">
                        <input type="hidden" name="phone" id="cf_phone">
</form>

<!-- ================= JS ================= -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function () {

    $('.buyNowBtn').click(function () {
        let bookId = $(this).data('book-id');
        $('#cf_book_ids').val(bookId);
        $('#paymentModal').removeClass('hidden');
    });

    $('#buySelected').click(function () {
        let ids = [];
        $('.bookCheckbox:checked').each(function () {
            ids.push($(this).val());
        });

        if (ids.length === 0) {
            alert('Select at least one book');
            return;
        }

        $('#cf_book_ids').val(ids.join(','));
        $('#paymentModal').removeClass('hidden');
    });

    $('#closeModal').click(function () {
        $('#paymentModal').addClass('hidden');
    });

    $('#confirmPay').click(function () {

        $('#cf_name').val($('#pay_name').val());
        $('#cf_email').val($('#pay_email').val());
        $('#cf_phone').val($('#pay_phone').val());

        $('#cashfreeForm').submit();
    });

});
</script>
