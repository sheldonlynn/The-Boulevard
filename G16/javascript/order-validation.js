/* FUNCTION TO GET ID FOR WRITING ERROR MESSAGES */
function $(id) {
	var element = document.getElementById(id);
	return element;
}

/* MAIN FUNCTION FOR ORDER VALIDATION */
function orderValidate() {
	var order = document.forms["order-form"]["order"].value;
	if(order.length == 0) {
		$("order-error").innerHTML = "You must enter an order";
		return false;
	}
	else {
		$("order-error").innerHTML = "";
		return true;
	}
}