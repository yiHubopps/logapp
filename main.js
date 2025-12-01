// Evita enviar formularios vacíos (simple)
document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", e => {
        const inputs = form.querySelectorAll("input");
        for(const i of inputs){
            if(i.value.trim() === ""){
                alert("Por favor rellena todos los campos.");
                e.preventDefault();
                return;
            }
        }
    });
});
