<div class="title">Remove Product</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="content">

    <form method="post" action="">
        <div class="user-details">

            <div class="input-box" style="width:49%">
                <span class="details">Product ID:</span>
                <input type="text" name="product_id" id="product_id" placeholder="Enter Product ID you want to Remove" required>
            </div>


            <div class="button" style="width:49%; margin:23px 0px">
                <input type="button" name="submit" id="removebtn" value="Remove Product">

            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#removebtn').click(function(){
                    var id = $("#product_id").val();
                    $("#response").load("remove.php",{
                        product_id: id, 
                    })
                })
            })
        </script>
        <div class="user-details" id="response">

        </div>
    </form>
</div>