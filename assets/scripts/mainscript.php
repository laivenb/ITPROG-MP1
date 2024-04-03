<script>
    function showAddToCartModal(dishName, dishPrice, itemId, imgName) {
        document.getElementById("modalDishNameAndPrice").innerText = dishName + "   " + dishPrice;
        document.getElementById("modalItemId").value = itemId;
        document.getElementById("modalItemImg").setAttribute("src", "assets/images/" + imgName);
        addCartModal.style.display = "block";
</script>