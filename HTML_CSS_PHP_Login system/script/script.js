window.addEventListener('click', calculateTotal);
document.querySelector('.product_table').addEventListener('load', calculateTotal);

function calculateTotal() {

    var Nu_rows =document.getElementById("table").rows.length;
    var total = 0;

    for (var i = 1; i<Nu_rows-1; i++) {
        var price = parseFloat(table.rows[i].cells[1].innerHTML);
        var dis = parseFloat(table.rows[i].cells[2].innerHTML);
        
        total += price;
    }

    table.rows[Nu_rows-1].cells[1].innerHTML = total;

}



function additem(button){
    
    const row = button.parentNode.parentNode;

    var name = row.cells[1].innerHTML;
    var price = row.cells[2].innerHTML;
    var dis = row.cells[3].innerHTML;

    

    const cart = document.getElementById("cart_body");
    const newRow = cart.insertRow();

    const c_name = newRow.insertCell(0);
    const c_price = newRow.insertCell(1);
    const c_dis = newRow.insertCell(2);
    const c_action = newRow.insertCell(3);

    var dis_price = price - ((price * parseInt(dis))/100);

    c_name.innerHTML = name;
    c_price.innerHTML = dis_price;
    c_dis.innerHTML = dis;
    c_action.innerHTML = '<button class="action_but" onclick="removeitem(this)">Remove</button>';
    
}

function removeitem(button){
    const row = button.parentNode.parentNode;

    row.remove();
}
