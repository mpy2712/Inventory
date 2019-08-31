 $(document).ready(function(){
     //validateMrn();
 });
 
    var baseurl = 'http://localhost/Inventory/';

    function select_vendor(vendor_id,vendor_name){
        jQuery("#vendor_name").val(vendor_name);
        jQuery("#vendor_id").val(vendor_id);
    }


    function check_Item_In_Row(item_id,under_which_class){
        jQuery("input[id ^=item_id_"+item_id).each(function(value){
           console.log(value); 
        });
    }
    var item_id_incr = 0;
    
    function select_item(item_id,item_name,item_code,batch_no){
        var length = parseInt(jQuery("#item_details tr").length) ;
        var item_id_incr = length > 1 ? length : length;  
        var sno = parseInt(jQuery("#item_details tr").length) + 1;
        
        var itemObject = {item_id,item_name,item_code,batch_no,item_id_incr,sno};
        appendItem(itemObject);
    }

    function appendItem(itemObject){
        var {item_id,item_name,item_code,batch_no,item_id_incr,sno} = itemObject;
        if ( itemObject !== undefined ){
//            var row = "<tr>" + 
//                        "<td>"+sno+"</td>"+
//                        "<td>"+item_name + "</td>" + 
//                        "<td>"+item_code + "</td>"+
//                        "<td><input type='text' class='form-control' name='item["+item_id_incr+"][batch_no]' value='' placeholder='Batch No' id='batch_no' autocomplete='off'/> </td>"+
//                        "<td><input type='text' class='form-control' name='item["+item_id_incr+"][req_qty]' id='req_qty' placeholder='Item Qty' autocomplete='off'/> </td>"+
//                        "<td><input type='text' class='form-control' name='item["+item_id_incr+"][rec_qty]' id='rec_qty' placeholder='Rec Qty' autocomplete='off' /> "+
//                        "<input type='hidden' name='item["+item_id_incr+"][item_id]'  id='item_id[]'  value='"+item_id+"' />"+
//                        "</td>"+
//                        "<td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i>&nbsp;&nbsp;&nbsp;<i style='cursor:pointer' class='fa fa-plus' aria-hidden='true' style='corsor:pointer' onclick='addItemRow(this)' ></i></td>"
//                    "</tr>";
//                        item_id_incr ++;
//            var row = "<tr>" + 
//                        "<td>"+sno+"</td>"+
//                        "<td>"+item_name + "</td>" + 
//                        "<td>"+item_code + "</td>"+
//                        "<td><input type='text' class='form-control' name='batch[]' value='' placeholder='Batch No' id='batch_no' autocomplete='off'/> </td>"+
//                        "<td><input type='text' class='form-control' name='req_qty[]' id='req_qty' placeholder='Req Qty' autocomplete='off'/> </td>"+
//                        "<td><input type='text' class='form-control' name='rec_qty[]' id='rec_qty_"+item_id_incr+"' placeholder='Rec Qty' autocomplete='off' /> "+
//                        "<input type='hidden' name='item[]'  id='item_id[]'  value='"+item_id+"' />"+
//                        "</td>"+
//                        "<td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i>&nbsp;&nbsp;&nbsp;<i style='cursor:pointer' class='fa fa-plus' aria-hidden='true' style='corsor:pointer' onclick='addItemRow(this)' ></i></td>"
//                    "</tr>";
//                        item_id_incr ++;

        var row = "<tr>" + 
                        "<td>"+sno+"</td>"+
                        "<td>"+item_name + "</td>" + 
                        "<td>"+item_code + "</td>"+
                        "<td><input type='text' class='form-control' name='item[batch_no][]' value='' placeholder='Batch No' id='batch_no' autocomplete='off'/> </td>"+
                        "<td><input type='text' class='form-control' name='item[req_qty][]' id='req_qty' placeholder='Item Qty' autocomplete='off'/> </td>"+
                        "<td><input type='text' class='form-control' name='item[rec_qty][]' id='rec_qty' placeholder='Rec Qty' autocomplete='off' /> "+
                        "<input type='hidden' name='item[item_id][]'  id='item_id[]'  value='"+item_id+"' />"+
                        "</td>"+
                        "<td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i>&nbsp;&nbsp;&nbsp;<i style='cursor:pointer' class='fa fa-plus' aria-hidden='true' style='corsor:pointer' onclick='addItemRow(this)' ></i></td>"
                    "</tr>";
                        item_id_incr ++;
            jQuery("#item_details").append(row);
        }
    }
    
    function reCreateSno(){
        var sno = 0;
        jQuery("#item_details tr").each(function(){
            $(this).children('td:first').text(++sno);
        });
    }
    
    function addItemRow(object){
        var parentRow = jQuery(object).parent().parent("tr");
//        var changedRow = parentRow;
//        for( let index = 0 ; index < 3; index++  ){
//            changedRow.children()[index].innerHTML = '';
//            //console.log(parentRow.children()[index]);
//        }
//        
//        console.log(changedRow);
        
        
        parentRow.clone().insertAfter(parentRow);
        reCreateSno();
    }
    

    function deleteItemRow(row){
        jQuery(row).parent().parent("tr").remove();
        reCreateSno();
    }

function select_employee(emp_id,emp_name){
    jQuery("#emp_name").val(emp_name);
    jQuery("#employee_id").val(emp_id);
}

var item_id_incr = 0;
function select_issue_item(item_id,item_name,item_code,batch_no){
    var length = parseInt(jQuery("#item_details tr").length) ;
    item_id_incr = length > 1 ? length : length;  
    var row = "<tr>" + 
                    "<td></td>"+
                    "<td>"+item_name + "</td>" + 
                    "<td>"+item_code + "</td>"+
                    "<td><input type='text'  class='form-control' name='item["+item_id_incr+"][batch_no]' placeholder='Batch No' id='batch_no'/> </td>"+
                    "<td><input type='number'  class='form-control' name='item["+item_id_incr+"][issue_qty]' placeholder='Issue Qty'  id='item_issue_qty'/> </td>"+
                    "<td><input type='date' class='form-control' name='item["+item_id_incr+"][issue_date]' id='item_rec_qty'/> "+
                    "<input type='hidden' name='item["+item_id_incr+"][item_id]'  value='"+item_id+"' />"+
                    "</td>"+
                    "<td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i></td>"
                "</tr>";
                    item_id_incr ++;
    
    jQuery("#item_details").append(row);
    reCreateSno();

}
function get_issue_items(issue_id){
    if ( parseInt(issue_id) > 0 ){
        $.ajax({
                type: "POST",
                url: baseurl + 'return_slip/get_item_details/',
                data: {'issue_id':issue_id},
                success: function (data) {
                    var Obj = JSON.parse(data);
                    if ( Obj.status == true ){
                        jQuery("#item_details").html(Obj.html);
                    }
                    console.log(Obj);
                    
                }
            });
    }
}

    
            
let validateMrn = () => $("#mrn_form").validate({
        
        rules: {
            mrn_no: "required",
            mrn_date: "required",
            vendor_name: {required: true},
            
            'rec_qty[]': {
                required: function (element) {
                    var a = 0;
                    
                    $('input[name^="rec_qty"]').each(function (i) {
                        $(this).val() != '' ? ++a:0;
                    });
                    console.log(a != $('input[name^="rec_qty[]"]').length);
//                    console.log($('input[name^="rec_qty[]"]').length + " >>> "+a);
                   // console.log(a == $('input[name^="rec_qty[]"]').length);
                    if ( a != $('input[name^="rec_qty[]"]').length )
                        return true;
                    return false;
                    return a == $('input[name^="rec_qty[]"]').length;
                    //return $('input[name^="rec_qty[]"]').length != a;
                        //return $("#rec_qty").val() != '0';
                }
            },
            
            
        },
        messages: {
            //"item[]": "Request qty is requred"
//            firstname: "Please enter your firstname",
//            lastname: "Please enter your lastname",
//            username: {
//                required: "Please enter a username",
//                minlength: "Your username must consist of at least 2 characters"
//            },
//            password: {
//                required: "Please provide a password",
//                minlength: "Your password must be at least 5 characters long"
//            },
//            confirm_password: {
//                required: "Please provide a password",
//                minlength: "Your password must be at least 5 characters long",
//                equalTo: "Please enter the same password as above"
//            },
//            email: "Please enter a valid email address",
//            agree: "Please accept our policy"
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            
            // Add the `invalid-feedback` class to the error element
            error.addClass("invalid-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.next("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        success: function (e) {
            e.closest(".form-group").removeClass("has-error")
        },
        submitHandler: function (e) {
            //i.show(), r.hide(), 




            alert();
        }
    });
