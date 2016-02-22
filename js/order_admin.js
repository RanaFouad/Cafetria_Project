/*$(document).ready(function(){
 // bind event handlers when the page loads

 fn();

 });
 */
$(function() {
    var image_id;
    var table=$("#table");
    var product_name;
    var choosen_product=[];
    var amount=[];
    var index=0;
    var flag=0;
    var final_amount=0;
    var choosen_product_array_length=choosen_product.length;
//var price_array={"tea":2,"orange juice":5}
    var amount_price=0;
    var single_price=0;
    var all_order_price_array=[];
    var total_price=0;
    var btn_id;
    var data={};
    var data_index=0;
    var product_id_array=[];
    var product_amount_array=[];
    var total_price_array=[];
    var pro_id;
    var pro_amount=0;
    var tot_price=0;


    $("[name = image_div]").click(image_click);
    function image_click(e)
    {
        e.stopPropagation();
        image_id=e.target.id;
        //console.log(image_id);
        image_name=$("#sp_"+image_id).text();
        //console.log(image_name);
        for(var i=0;i<choosen_product.length;i++)
        {
            if(image_name==choosen_product[i])
            {
                flag=1;
                amount[i]=amount[i]+1;
                index=i;
                break;
            }

        }
        if(flag==1)
        {
            final_amount=amount[index];
            //final_amount=final_amount++;
            //console.log(final_amount);

            //amount[index]=final_amount;
            flag=0;
            single_price=parseInt($("#price_"+image_id).val());
            //console.log("single_price",single_price);
            amount_price=single_price*final_amount;
            all_order_price_array[index]=amount_price
            $("#row_"+image_id).replaceWith('<tr id="row_'+image_id+'" data="'+image_id+'" ><td id="name_'+image_id+'">'+image_name+'</td><td><input id="amount_'+image_id+'" type="text" style="width:45px;" value="'+final_amount+'" disabled></td><td><button id="inc_'+image_id+'">+</button></td><td><button id="dec_'+image_id+'">-</button></td><td id="p_'+image_id+'">'+amount_price+'</td><td><button id="btn_'+image_id+'">cancel</button></td></tr>');
            $("#btn_"+image_id).on("click",cancel_click);
            $("#inc_"+image_id).on("click",increment);
            $("#dec_"+image_id).on("click",decrement);
            console.log("btngan m2ly");

        }
        else
        {
            choosen_product_array_length=choosen_product.length;
            choosen_product[choosen_product_array_length]=image_name;
            amount[choosen_product_array_length]=1;
            final_amount=1;
            index=choosen_product_array_length;
            single_price=parseInt($("#price_"+image_id).val());
            //console.log("single_price",single_price);
            amount_price=single_price;
            all_order_price_array[choosen_product_array_length]=amount_price;

            $("#table").append('<tr id="row_'+image_id+'" data="'+image_id+'"><td id="name_'+image_id+'">'+image_name+'</td><td><input id="amount_'+image_id+'" type="text" style="width:45px;" value="'+final_amount+'" disabled></td><td><button id="inc_'+image_id+'">+</button></td><td><button id="dec_'+image_id+'">-</button></td><td id="p_'+image_id+'">'+amount_price+'</td><td><button id="btn_'+image_id+'">cancel</button></td></tr>');
            //console.log("ttttttttttttttttt",$("#row_"+image_id));

            console.log("btngan mashoy");
            $("#btn_"+image_id).on("click",cancel_click);
            $("#inc_"+image_id).on("click",increment);
            $("#dec_"+image_id).on("click",decrement);

        }



        for(var i=0;i<all_order_price_array.length;i++)
        {

            total_price=total_price+all_order_price_array[i];

        }


        $("#total_price").text(total_price);


        total_price=0;

    }



//var button=$("#table>tbody>tr>td>button");
    //  console.log(button.get(0));

//button.on("click",cancel_click);


    function cancel_click(e)
    {

        //console.log(e.target.id);

        btn_id= e.target.id;
        var id_number=btn_id.split('_');
        console.log(id_number[1]);
        var row_deleted=$("#row_"+id_number[1]);
        //console.log(row_deleted.children('td').get(0).textContent);
        var column_content=row_deleted.children('td').get(0).textContent;
        for(var i=0;i<choosen_product.length;i++)
        {
            if(column_content==choosen_product[i])
            {
                choosen_product.splice(i,1);
                amount.splice(i,1);
                all_order_price_array.splice(i,1);
                index=i;
                break;
            }



        }

        row_deleted.remove();


        for(var i=0;i<all_order_price_array.length;i++)
        {

            total_price=total_price+all_order_price_array[i];

        }


        $("#total_price").text(total_price);


        total_price=0;



    }



    $("#search_product").keyup(function(e){
        var pValue = $("#search_product").val();
        $.ajax
        ({
            url: "ajax-files/search_product_order_user_ajax.php",
            method:'get',
            data:{
                "value":pValue
            },
            success:function(response){
                $("#productView").html(response);
                // $("#productView img").on("click",image_click);
                //console.log("sssssss");
                //fn();
                $("[name = image_div]").click(image_click);
            }
        });
    });





    $("#confirm").click(function(e){


        var notes=$("#notes").val();
        var room_number=$("#room option:selected").val();
        var user_name=$("#user option:selected").val();

        if( user_name=="")
        {
            $("#not_select_user").text("you have to select user");
            console.log("rrr",room_number);

        }

        if(room_number=="")
        {
            $("#not_select").text("you have to select room");
            console.log("rrr",room_number);


        }
        else
        {

            $("#table tr").each(function(e)
            {

                pro_id=$(this).attr('data');

                product_id_array[data_index]=pro_id;


                if(pro_id!=-1)
                {

                    pro_amount=$("#amount_"+pro_id).val();
                    product_amount_array[data_index]=pro_amount;
                    tot_price=$("#p_"+pro_id).html();
                    total_price_array[data_index]=tot_price;

                }


                if(pro_id!=-1) {
                    data_index++;
                }



            });

            data={"notes":notes,"userid":2,"roomno":room_number,"prodid":product_id_array,"amount":product_amount_array,"totalprice":total_price_array};





            console.log("found",room_number);


            var dataString = JSON.stringify(data);

            $.ajax
            ({
                url: "ajax-files/insert_order_order_user_ajax.php",
                method: 'get',
                data: {
                    "value": dataString
                },
                success: function (response) {
                    //     if (jQuery.trim(response) === "you have to select room") {
                    //     $("#not_select").html(response);
                    //   }
                    // else {
                    $("#not_select").html("");
                    $("#not_select_user").html("");
                    //  $("#tab").html(response);
                    $('#table').empty();
                    choosen_product = [];
                    choosen_product_array_length=0;
                    product_id_array=[];
                    product_amount_array=[];
                    total_price_array=[];
                    data_index=0;
                    all_order_price_array=[];
                    $("#total_price").text(0);
                    $("#room option:selected").removeAttr('selected').filter('[value=""]').attr('selected', true);
                    $("#notes").val("");
                    $("#user option:selected").removeAttr('selected').filter('[value=""]').attr('selected', true);

                    // $("[name = image_div]").unbind('click');
                    // fn();
                    //choosen_product =  [];
                    //}
                    //console.log(jQuery.trim(response));
                }
            });














        }




    });












    function increment(e)
    {
        var button_id=e.target.id;
        var x=button_id.slice(4,5);
        //console.log(x);

        //console.log("ffffffffff", e.target.id);

        //console.log($("#amount_"+image_id).val());
        final_amount=parseInt($("#amount_"+x).val());
        //console.log("eeeeee",final_amount);
        final_amount=final_amount+1;
        var prod_name=$("#name_"+x).text();
        //console.log("prod_name",prod_name);

        for(var i=0;i<choosen_product.length;i++)
        {
            if(prod_name==choosen_product[i])
            {
                amount[i]=final_amount;
                index=i;
                break;
            }

        }

        single_price=$("#price_"+x).val();
        //console.log("single_price",single_price);
        amount_price=single_price*final_amount;
        all_order_price_array[index]=amount_price
        //console.log(amount_price);
        // $("#row_"+x).replaceWith('<tr id="row_'+x+'"><td id="name_'+x+'">'+prod_name+'</td><td><input id="amount_'+x+'" type="text" style="width:45px;" value="'+final_amount+'" disabled></td><td><button id="inc_'+x+'">+</button></td><td><button id="dec_'+x+'">-</button></td><td>'+amount_price+'</td><td><button id="btn_'+x+'">cancel</button></td></tr>');
        // $("#btn_"+image_id).on("click",cancel_click);
        //$("#inc_"+image_id).on("click",increment);
        //$("#dec_"+x).on("click",decrement);
        $("#amount_"+x).val(final_amount);

        $("#p_"+x).text(amount_price);
        // console.log($("#p_"+x));
        for(var i=0;i<all_order_price_array.length;i++)
        {

            total_price=total_price+all_order_price_array[i];

        }


        $("#total_price").text(total_price);


        total_price=0;



    }


    function decrement(e)
    {
        var button_id=e.target.id;
        var x=button_id.slice(4,5);
        //console.log(x);

        //console.log("ffffffffff", e.target.id);

        //console.log($("#amount_"+image_id).val());
        final_amount=parseInt($("#amount_"+x).val());
        //console.log("eeeeee",final_amount);
        final_amount=final_amount-1;
        if(final_amount==0)
        {
            var row_deleted=$("#row_"+x);

            var column_content=row_deleted.children('td').get(0).textContent;
            for(var i=0;i<choosen_product.length;i++)
            {
                if(column_content==choosen_product[i])
                {
                    choosen_product.splice(i,1);
                    amount.splice(i,1);
                    all_order_price_array.splice(i,1);
                    index=i;
                    break;
                }



            }

            row_deleted.remove();


            for(var i=0;i<all_order_price_array.length;i++)
            {

                total_price=total_price+all_order_price_array[i];

            }


            $("#total_price").text(total_price);


            total_price=0;



        }
        else {
            var prod_name = $("#name_" + x).text();
            //console.log("prod_name",prod_name);

            for (var i = 0; i < choosen_product.length; i++) {
                if (prod_name == choosen_product[i]) {
                    amount[i] = final_amount;
                    index = i;
                    break;
                }

            }

            single_price = $("#price_" + x).val();
            //console.log("single_price",single_price);
            amount_price = single_price * final_amount;
            all_order_price_array[index] = amount_price
            //console.log(amount_price);
            // $("#row_"+x).replaceWith('<tr id="row_'+x+'"><td id="name_'+x+'">'+prod_name+'</td><td><input id="amount_'+x+'" type="text" style="width:45px;" value="'+final_amount+'" disabled></td><td><button id="inc_'+x+'">+</button></td><td><button id="dec_'+x+'">-</button></td><td>'+amount_price+'</td><td><button id="btn_'+x+'">cancel</button></td></tr>');
            // $("#btn_"+image_id).on("click",cancel_click);
            //$("#inc_"+image_id).on("click",increment);
            //$("#dec_"+x).on("click",decrement);
            $("#amount_" + x).val(final_amount);

            $("#p_" + x).text(amount_price);
            // console.log($("#p_"+x));
            for (var i = 0; i < all_order_price_array.length; i++) {

                total_price = total_price + all_order_price_array[i];

            }


            $("#total_price").text(total_price);


            total_price = 0;

        }

    }








});
