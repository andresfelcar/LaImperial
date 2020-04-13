window.onload=Consult;
var global;
function Consult() {
	name="hola"
	$.ajax({
	  type:"POST",
	  data:"table=" + name,
	  url: "Select_Products.php",
	  dataType: "json",
	  success:function(r){
		console.log(r);
		global = r;
	  }
	});
	return global;
  }
 $(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		console.log(global);
		var datos;
		for(i=1;i<=global.length;i++){
			items=global[i-1];
			datos+='<option value="'+items[0]+'">'+items[1]+'</option>';
		}
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
		htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	          
		htmlRows += '<td><select name="productCode[]" id="productCode_'+count+'" class="form-control"><option selected>Seleccione alguno</option>'+datos+'</select></td>' ; 
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off" readonly="readonly"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {
			$('#amountDue').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice', function(){
		var id = 7;
		id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"Delete_Invoice.php",
				method:"POST",
				data:'id=' +id,				
				success:function(response) {
					$('#'+id).closest("tr").remove();					
				}
			});
		} else {
			return false;
		}
	});
});	





function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount));	
	var taxRate = $("#taxRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		$('#taxAmount').val(taxAmount);
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount);
		$('#totalAftertax').val(subTotal);		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {		
			$('#amountDue').val(subTotal);
		}
	}
}

 