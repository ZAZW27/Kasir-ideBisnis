
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
}else{
    ready()
}

function ready(){
    var removeCartItemButtons = document.getElementsByClassName("delete-row")
    console.log(removeCartItemButtons)
    for(var i = 0; i < removeCartItemButtons.length; i++){
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }
    
    var quantityInput = document.getElementsByName('cart-quantity-input')
    for(var i = 0; i < quantityInput.length; i++){
        var input = quantityInput[i]
        input.addEventListener('change', quantityChanged)
    }
}

function removeCartItem(event){
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function quantityChanged(event){
    var input = event.target
    if (isNaN(input.value) || input.value <= 0 ) {
        input.value = 1
    }
    updateCartTotal()
}

function updateCartTotal(){
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for(var i = 0; i < cartRows.length; i++){
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName("cart-price")[0]
        var quantityElement = cartRow.getElementsByClassName("cart-quantity-input")[0]
        var price = priceElement.innerText.replace('Rp', '')
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    var formattedNumber = total.toLocaleString().replace(/,/g, '.');
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Rp ' + formattedNumber
}

function updateHarga(){
    var id_barang = document.getElementById('select-barang').value
    var harga_barang = document.getElementById(`${id_barang}-harga`).textContents
    document.getElementById('selectedPrice').innerText = harga_barang
}

function sendButton(){
    var levelUser = document.getElementById('level-user').textContent//mengambil level user

    var id_barang = document.getElementById('select-barang').value
    var harga_barang = document.getElementById(`${id_barang}-harga`).textContent
    var nama_barang = document.getElementById(`${id_barang}-nama`).textContent
    var quantitas_barang = document.getElementById(`quantitas-barang`).value

    // membuat fungsi jika barang sudah ada dalam cart maka tidak akan duplikasi   =====================
    var getBody = document.getElementById('table-body');
    var cartItems = getBody.querySelectorAll('.nama__barang');

    for (var i = 0; i < cartItems.length; i++) {
        if (cartItems[i].innerText === nama_barang) {
            alert("Item already added to the cart");
            return;
        }
    }

    if (!(parseInt(quantitas_barang) > 0) || isNaN(quantitas_barang)) {
        quantitas_barang = 1;
    }

    console.log(harga_barang, nama_barang, quantitas_barang)
    var tableContent = `
    <tr class="table-row cart-row">
        <td class="table-row__td">
            <div class="table-row__info">
                <input type="text" value="${id_barang}" name="id_barang[]" id="id-barang" hidden>
                <p class="table-row__name nama__barang" name="nama_barang[]">${nama_barang}</p>
            </div>
            </td>
            <td data-column="Harga Satuan" class="table-row__td">
            <div class="">
                <p class="table-row__policy cart-price" name="harga_barang[]">${harga_barang}</span></p>
            </div>
            </td>
            <td data-column="Quantitas" class="table-row__td">
            <div class="quantity ">
                <input onchange="quantityChanged()" class="cart-quantity-input" name="quantity_barang[]" value="${quantitas_barang}" type="number">
            </div> 
        </td>
  
    `

    if (levelUser == 'admin' || levelUser == "kasir") {
        tableContent = tableContent + `
        <td class="table-row__td ">
            <button class="delete-row">
            Delete
            </button>
        </td>
        `
    }

    tableContent += `</tr>`

    var tableBody = document.getElementById('table-body').innerHTML
    document.getElementById('table-body').innerHTML = tableBody + tableContent

    ready()
    updateCartTotal()
}