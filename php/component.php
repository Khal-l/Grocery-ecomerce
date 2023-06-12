<?php

function component($productname, $productprice, $productimg, $productid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid pr_img card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            
                            <p class=\"card-text\">
                                Some quick example text to build on the card.
                            </p>
                            <h5>
                                
                                <span class=\"price\">$$productprice</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid pr_img\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                               
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            
                        </div>
                    </div>
                </form>
                <script type=\"text/javascript\">
                    function increment(id){
                        var idname = 'count_';
                        id = idname.concat(id);
                        var element = document.getElementById(id);
                        element.value = parseInt(element.value) + 1;
                    }
                    function decrement(id){
                        var idname = 'count_';
                        id = idname.concat(id);
                        var element = document.getElementById(id);
                        element.value = element.value - 1;
                    }
                </script>
    ";
    echo  $element;
}
