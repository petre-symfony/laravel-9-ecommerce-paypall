<script type="text/javascript" defer>
    $(document).ready(function(){
        <?php for($i=1;$i<20;$i++){ ?>
        $('#upCart<?php echo $i; ?>').on('change keyup', function(){
            var newqty = $('#upCart<?php echo $i; ?>').val();
            var rowId = $('#rowId<?php echo $i; ?>').val();
            var proId = $('#proId<?php echo $i; ?>').val();

            if(newqty <= 0){
                alert('enter only valid quantity');
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/update_cart') ?>/'+proId,
                    data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                    success: function(response){
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });
            }
        });
        <?php } ?>
    })

</script>
<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
        <tr class="cart_menu">
            <td class="image">Image</td>
            <td class="description">Product</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
        </tr>

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @if(session('error'))

            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif

        </thead>

        <?php $count = 1;?>
        <tbody>
        @foreach($cartItems as $cartItem)
            <tr>
                <td class="cart_product">
                    <p>
                        <img
                            src="{{URL::asset('images/'.$cartItem->options->img)}}"
                            class="card-img-top bmw"
                        >
                    </p>
                </td>

                <td class="class-description">

                    <img src="URL::asset('images/'. $cartItem->img)" alt="" class="card-img-top">
                    <h4>
                        <a
                            href="{{ route('product_details', [
                                                          'id' => $cartItem->id])
                                                        }}"
                            style="color: blue"
                        ></a>
                    </h4>
                    <p>Product ID: {{ $cartItem->id }}</p>
                    <p>Only {{ $cartItem->options->stock }} left</p>

                </td>
                <td class="cart_price">
                    <p>${{$cartItem->price}}</p>
                </td>
                <td class="cart_quantity">
                    <input type="hidden" id="rowId<?php echo $count ?>" name="rowId" value="{{ $cartItem->rowId }}">
                    <input type="hidden" id="proId<?php echo $count ?>" name="proId" value="{{ $cartItem->id }}">

                    <input
                        type="number" size="2" name="qty"
                        value="{{ $cartItem->qty }}"
                        id="upCart<?php echo $count ?>"
                        autocomplete="off" style="text-align: center; max-width: 50px"
                        min="1" max="1000"
                    >

                    <input type="submit" class="btn btn-primary" value="Update" style="margin:5px">

                </td>

                <td class="cart_total">
                    <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                </td>
                <td class="cart_delete">
                    <button class="btn btn-primary">
                        <a class="cart_quantity_delete" style="background-color:red"
                           href="{{ route('remove_item_from_cart', ['id' => $cartItem->rowId]) }}"
                        >
                            <i class="fa fa-times">X</i>
                        </a>
                    </button>
                </td>
            </tr>

            <?php $count++;?>


        @endforeach
        </tbody>
    </table>
</div>
