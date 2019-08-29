//
//$(document).ready(function() {
//  //loadUserSubAccount();
//  try {
//    FormValidation_item_master_edit_form.init();
//  } catch (err) {}
//});
//
//var FormValidation_item_master_edit_form = function () {
//    var e = function () {
//        var e = $("#item_master_edit_form"),
//                r = $(".alert-danger", e),
//                i = $(".alert-success", e);
//        e.validate({
//            errorElement: "span",
//            errorClass: "help-block help-block-error",
//            focusInvalid: !1,
//            ignore: "",
//            rules: {
//                itemName: {
//                    required: true,
//                    
//                },
//                itemCode: {
//                    required: !0
//                },
//                itemDesc: {
//                    required: !0,
//                }
//            },
//            messages:{},
//            invalidHandler: function (e, t) {
//                i.hide(), r.show(), App.scrollTo(r, -200)
//            },
//            errorPlacement: function (e, r) {
//                var i = $(r).parent(".input-group");
//                i.size() > 0 ? i.after(e) : r.after(e)
//            },
//            highlight: function (e) {
//                $(e).closest(".form-group").addClass("has-error")
//            },
//            unhighlight: function (e) {
//                $(e).closest(".form-group").removeClass("has-error")
//            },
//            success: function (e) {
//                e.closest(".form-group").removeClass("has-error")
//            },
//            submitHandler: function (e) {
//                i.show(), r.hide();
//                       
//                
//                this.form.submit();
//            }
//        })
//    }
//    return {
//        init: function () {
//            e()
//        }
//    }
//}();

var baseurl = 'http://localhost/Inventory/';
function select_vendor(vendor_id,vendor_name){
    jQuery("#vendor_name").val(vendor_name);
    jQuery("#vendor_id").val(vendor_id);
}

var item_id_incr = 0;
function select_item(item_id,item_name,item_code,batch_no){
    var length = parseInt(jQuery("#item_details tr").length) ;
    item_id_incr = length > 1 ? length : length;  
    var row = "<tr>" + 
                    "<td>1</td>"+
                    "<td>"+item_name + "</td>" + 
                    "<td>"+item_code + "</td>"+
                    "<td><input type='text' name='item["+item_id_incr+"][batch_no]' value="+batch_no+" id='batch_no'/> </td>"+
                    "<td><input type='text' name='item["+item_id_incr+"][req_qty]' id='item_req_qty'/> </td>"+
                    "<td><input type='text' name='item["+item_id_incr+"][rec_qty]' id='item_rec_qty'/> "+
                    "<input type='hidden' name='item["+item_id_incr+"][item_id]'  value='"+item_id+"' />"+
                    "</td>"+
                    "<td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i></td>"
                "</tr>";
                    item_id_incr ++;
    console.log(row);
    
    jQuery("#item_details").append(row);
    
}

function deleteItemRow(row){
    jQuery(row).parent().parent("tr").remove();
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
                    "<td>1</td>"+
                    "<td>"+item_name + "</td>" + 
                    "<td>"+item_code + "</td>"+
                    "<td><input type='text'  class='form-control' name='item["+item_id_incr+"][batch_no]' value="+batch_no+" id='batch_no'/> </td>"+
                    "<td><input type='text'  class='form-control' name='item["+item_id_incr+"][issue_qty]' id='item_issue_qty'/> </td>"+
                    "<td><input type='date' class='form-control' name='item["+item_id_incr+"][issue_date]' id='item_rec_qty'/> "+
                    "<input type='hidden' name='item["+item_id_incr+"][item_id]'  value='"+item_id+"' />"+
                    "</td>"+
                    "<td><i class='fa fa-trash-o' style='cursor:pointer' onclick='deleteItemRow(this)' ></i></td>"
                "</tr>";
                    item_id_incr ++;
    
    jQuery("#item_details").append(row);
    
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


